<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PaymentTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Payment::create([
            'title'         => 'SEOcoin',
            'icon'          => 'https://static.webshopapp.com/assets/icon-payment-blank.png',
            'price_incl'    => 6.05,
            'price_excl'    => 5.00,
            'tax_rate'      => 0.21
        ]);
    }

}
