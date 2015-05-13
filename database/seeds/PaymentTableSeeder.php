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

        \App\Payment::create([
            'title'         => 'iDeal',
            'icon'          => 'ideal',
            'price_incl'    => 2.42,
            'price_excl'    => 2.00,
            'tax_rate'      => 0.21
        ]);

        \App\Payment::create([
            'title'         => 'Mastercard',
            'icon'          => 'mastercard',
            'price_incl'    => 1.21,
            'price_excl'    => 1.00,
            'tax_rate'      => 0.21
        ]);
    }

}
