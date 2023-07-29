<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;

class BookController extends Controller
{
    //
    public function index(){
        return view('book.index');
    }

    public function show($id){
        $book = BookModel::where('slug', $id)->first();

        $path_book = 'storage/' . $book->file_book;

        return view('book.show', compact('path_book'));
    }
}
