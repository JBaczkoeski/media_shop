<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('warehouse_id')->after('provinces_id')->nullable();
            $table->unsignedBigInteger('store_id')->after('warehouse_id')->nullable();

            $table->foreign('shop_id')->references('id')->on('stores');
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('warehouse_id');
            $table->dropColumn('shop_id');
        });
    }
};
