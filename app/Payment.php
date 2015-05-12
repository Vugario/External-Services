<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

	public $timestamps = false;

    public function toArray()
    {
        return [
            'title'     => $this->title,
            'icon'      => $this->icon,
            'price_incl' => $this->price_incl,
            'price_excl' => $this->price_excl,
            'tax_rate'   => $this->tax_rate
        ];
    }
}
