<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';

    protected $fillable = [
        'company_id',
        'total_price'
    ];

    public function offer_product()
    {
        return $this->hasMany(OfferProduct::class);
    }
}
