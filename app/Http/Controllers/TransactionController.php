<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Transaction;
use App\TransactionDetail;

class TransactionController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $transactions = User::find($user_id)->transactions;
        return view('transaction/transaction_history')->with('transaction', $transactions);
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $carts = User::find($user_id)->carts;

        $transaction = new Transaction;
        $transaction->user_id = Auth::id();
        $transaction->save();

        foreach($carts as $cart) {
            $detail = new TransactionDetail;
            $detail->transaction_id = $transaction->id;
            $detail->shoe_id = $cart->shoe_id;
            $detail->save();
            $cart->delete();
        }
        
        return redirect('/')->with('success', 'Checkout success');
    }

    public function show($id) {
        $details = Transaction::find($id)->transactionDetails;
        return view('transaction/transaction_detail')->with('details', $details);
    }
}
