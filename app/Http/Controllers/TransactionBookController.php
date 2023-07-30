<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionBookController extends Controller
{
    public function index(){
        return view('transaction-book.index');
    }
}
