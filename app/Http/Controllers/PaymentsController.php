<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Payment;
use App\Transaction;
use Illuminate\Http\Request;

class PaymentsController extends Controller {

	public function index()
    {
        return response()->json(['payment_methods' => Payment::all()]);
    }

    public function create()
    {
        $transaction = Transaction::create([
            'status'        => 'unpaid',
            'price_incl'    => 121,
            'price_excl'    => 100,
            'tax_rate'      => 0.21
        ]);

        return response()->json(['redirect_url' => url('payment/'.$transaction->id)]);
    }

    public function show($id)
    {
        if ($transaction = Transaction::find($id))
        {
            return view('payments.show', ['transaction' => $transaction]);
        }

        return redirect('/');
    }

    public function update($id, $status)
    {
        if ($transaction = Transaction::find($id))
        {
            $transaction->status = $status;
            $transaction->save();
        }

        // Redirect back to the checkout
        return redirect('/');
    }

}
