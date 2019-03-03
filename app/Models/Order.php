<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'billing_email', 
        'billing_name', 'billing_address1', 
        'billing_city','billing_area', 
        'billing_address2', 'billing_phone', 
        //'billing_name_on_card', 'billing_discount', 
        'billing_subtotal', 'billing_tax', 
        'billing_total', 'payment_gateway', 
        'error',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')
            ->withPivot('quantity');
    }

    public function getNumber($value)
    {
        return intval(str_replace(
            ',','',$this->{$value}
            )
        );
    }
}
