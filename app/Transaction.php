<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

    protected $fillable = [
        'order_id',
        'status',
        'price_incl',
        'price_excl',
        'tax_rate',
        'redirect_url'
    ];

}
