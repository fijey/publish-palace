<?php

namespace App\Http\Livewire\Pages\LandingPage;

use Livewire\Component;
use DB;
use App\Models\BookModel;
use Livewire\WithFileUploads; // Import namespace trait
use App\Http\Livewire\Helper\ToastHelper;
use Auth;

class Main extends Component
{   
    public $is_show = false;
    public $is_show_detail = false;
    public $is_edit = false;

    //init attribute
    public $book_id;
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
    //data
    public $data_books;
    public function mount(){
        $this->data_books = DB::table('books')->get();
    }
    public function hydrate(){
        $this->data_books = DB::table('books')->get();
    }
    public function render()
    {
        return view('livewire.pages.landing-page.main');
    }

    public function redirectLogin(){
        return redirect()->to('/login');
    }

    public function modal_detail_toggle($id = null){
        if($id != null){
            $detail= BookModel::where('id',$id)->first();
            $this->book_id = $detail->id;
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

        $this->is_show_detail = !$this->is_show_detail;

        if($this->is_show_detail == false){
            $this->clearFields();
            $this->is_edit = false;
        }
        
        $this->hydrate();
        $this->render();
    }

    public function clearFields()
    {
        $this->book_id = '';
        $this->edit = '';
        $this->judul_buku = '';
        $this->nama_penulis = '';
        $this->isbn = '';
        $this->kategori = null;
        $this->deskripsi = '';
        $this->cover = '';
        $this->file_book = '';
        $this->harga = '';
        $this->is_free = null;
        $this->lisensi = '';
        $this->is_publikasi = null;
    }
}
