<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\services\OrderService;
use App\services\PaymentService;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    protected $paymentService;
    protected $orderService;

    public function __construct(PaymentService $paymentService, OrderService $orderService)
    {
        $this->paymentService = $paymentService;
        $this->orderService = $orderService;
    }

    public function handlePayment()
    {
        $cart = $this->paymentService->orderInfo();

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('success.payment'),
                'cancel_url' => route('cancel.payment'),
            ],
            'purchase_units' => [
                [
                    'description' => 'Zakup przedmiotów z sklepu',
                    'amount' => [
                        'currency_code' => 'PLN',
                        'value' => $cart['cart_sum'],
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'PLN',
                                'value' => $cart['cart_sum'],
                            ],
                        ],
                    ],
                    'items' => $cart['buy_products'],
                ],
            ],
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] === 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Coś posżło nie tak.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Coś posżło nie tak.');
        }
    }

    public function paymentCancel(Request $request)
    {
        $message = $request->query('message', 'Transakcja została anulowana.');

        return redirect()
            ->route('create.payment')
            ->with('error', $message);
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $cart = $this->paymentService->orderInfo();

            $this->orderService->store($cart);
            $this->orderService->mail($cart);

            $this->paymentService->clearCart();

            return redirect()
                ->route('home')
                ->with('success', 'Tranzakcja przebiegła pomyślnie.');
        } else {
            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Coś posżło nie tak.');
        }
    }
}
