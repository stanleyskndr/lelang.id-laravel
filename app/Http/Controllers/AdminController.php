<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;

class AdminController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin_management/view_user')->with('users', $users);
    }

    public function viewAllTransaction() {
        $transactions = Transaction::all();
        return view('admin_management/view_user_transaction')->with('transactions', $transactions);
    }
}
