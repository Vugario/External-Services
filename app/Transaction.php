<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	public $timestamps = false;

    protected $fillable = [
        'status',
        'price_incl',
        'price_excl',
        'tax_rate'
    ];

}
