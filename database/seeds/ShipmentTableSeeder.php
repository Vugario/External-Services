<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ShipmentTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Shipment::create([
            'title'             => '1 hour delivery',
            'description'       => 'We\'ll drop by in 1 hour and deliver your package!',
            'price_incl'        => 6.05,
            'price_excl'        => 5.00,
            'tax_rate'          => 0.21
        ]);
    }

}
