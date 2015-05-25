<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shipment;
use Illuminate\Http\Request;

class ShipmentsController extends Controller {

	public function index()
    {
        return response()->json(['shipment_methods' => Shipment::all()]);
    }

    public function create()
    {
        return response()->json(['redirect_url' => 'http://google.nl/']);
    }

}
