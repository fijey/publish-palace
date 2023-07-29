<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreBookController extends Controller
{
    public function index(){
        return view('explore-book.index');
    }
}
