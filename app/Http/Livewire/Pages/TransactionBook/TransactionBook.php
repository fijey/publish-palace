<?php

namespace App\Http\Livewire\Pages\TransactionBook;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\BookModel;
use Auth;
class TransactionBook extends Component
{
    public $is_show_detail;

    //init attribute
        
    //init attribute
    public $book_id;
    public $user_id;
    public $slug;
    public $judul_buku;
    public $nama_penulis;
    public $isbn;
    public $kategori;
    public $nama_kategori;
    public $deskripsi;
    public $cover;
    public $file_book;
    public $harga;
    public $is_free;
    public $lisensi;
    public $is_publikasi;
    public $transaction;
    //init data
    public $data_history;


    public function mount(){
        $this->data_history = Transaction::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
    }
    public function hydrate(){
        $this->data_history = Transaction::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
    }

    public function modal_detail_toggle($id = null , $transaction_id = null){
        if($id != null){
            $detail= BookModel::where('id',$id)->first();
            $this->book_id = $detail->id;
            $this->user_id = $detail->user_id;
            $this->judul_buku = $detail->judul_buku;
            $this->slug = $detail->slug;
            $this->nama_penulis = $detail->nama_penulis;
            $this->isbn = $detail->isbn;
            $this->kategori = $detail->kategori;
            $this->nama_kategori = $detail->category->nama_kategori;
            $this->deskripsi = $detail->deskripsi;
            $this->cover = $detail->cover;
            $this->file_book = $detail->file_book;
            $this->harga = $detail->harga;
            $this->is_free = $detail->is_free;
            $this->lisensi = $detail->lisensi;
            $this->is_publikasi = $detail->is_publikasi;
        }

        if($transaction_id != null){
            $transaction = Transaction::where('id',$transaction_id)->first();
            $this->transaction = $transaction;
        }
        $this->is_show_detail = !$this->is_show_detail; 
    }
    
    public function render()
    {
        return view('livewire.pages.transaction-book.transaction-book');
    }

}
