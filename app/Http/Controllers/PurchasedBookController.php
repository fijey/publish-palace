<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasedBookController extends Controller
{
    public function index(){
        return view('purchased-book.index');
    }
}
