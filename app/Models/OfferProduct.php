<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    protected $table = 'offer_products';

    protected $fillable = [
        'offer_id',
        'width',
        'height',
        'fabric_type',
        'motor_type',
        'motor_direction',
        'remote_type',
        'ral_code',
        'product_price',
        'is_warranty_applicable',
        'is_logo'
    ];
}
