<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Payment;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PaymentsController extends Controller {

	public function index()
    {
        return response()->json(['payment_methods' => Payment::all()]);
    }

    public function create(Request $request)
    {
        $order = $request->input('order');

        $transaction = Transaction::create([
            'status'        => 'unpaid',
            'order_id'      => array_get($order, 'id'),
            'price_incl'    => array_get($order, 'price_incl'),
            'price_excl'    => array_get($order, 'price_excl'),
            'redirect_url'  => Input::get('redirect_url')
        ]);

        return response()->json(['payment_url' => url('pay/'.$transaction->id)]);
    }

    public function show($id)
    {
        if ($transaction = Transaction::find($id))
        {
            return view('payments.show', ['transaction' => $transaction]);
        }

        return redirect('/');
    }

    public function one($id)
    {
        if ($transaction = Transaction::where(['order_id' => $id])->orderBy('updated_at', 'desc')->first())
        {
            return response()->json(['status' => $transaction->status]);
        }

        return false;
    }

    public function update($id, $status)
    {
        if ($transaction = Transaction::find($id))
        {
            $transaction->status = $status;
            $transaction->save();
        }

        // Redirect back to the checkout
        return redirect($transaction->redirect_url);
    }

}
