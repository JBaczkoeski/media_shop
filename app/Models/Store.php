<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'province_id',
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\Provinces');
    }
}
