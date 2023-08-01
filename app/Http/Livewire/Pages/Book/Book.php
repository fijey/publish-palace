<?php

namespace App\Http\Livewire\Pages\Book;

use Livewire\Component;
use App\Models\BookModel;
use App\Models\BookView;
use App\Models\Transaction;
use Livewire\WithFileUploads; // Import namespace trait
use DB;
use App\Http\Livewire\Helper\ToastHelper;
use Auth;
use Xendit\Xendit;
use DateTime;
use DateTimeZone;

class Book extends Component
{
    use WithFileUploads;
    public $is_show = false;
    public $is_show_detail = false;
    public $is_edit = false;
    public $is_purchasing = false;

    public $is_loading_cover = false;
    public $is_loading_book = false;

    //init attribute
    public $search;
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

    //init data
    public $data_kategori;
    public $data_books;
    public $transaction;

    //digunakan untuk melihat buku yang dibeli
    public $purchased;

    //source
    public $from = 'myCollection';
    public $title = 'Your Book Collection';

    protected $listeners = [
        'close-modal' => 'modal_toggle',
        // 'render' => 'render'
    ];

    public function mount(){
        //query kategori
        $this->data_kategori = DB::table('kategori')->get();

        //query buku
        $queryDataBooks = DB::table('books');
        if($this->from == "myCollection"){
            $queryDataBooks->where('user_id', Auth::user()->id);
        }else{
            $queryDataBooks->where('is_publikasi',true);
        }

        if($this->from == "purchased"){
            $queryDataBooks = DB::table('transactions')->where('status','PAID')->where('transactions.user_id', Auth::user()->id)
            ->leftJoin('books', 'books.id', 'transactions.book_id');
        }

        $this->data_books = $queryDataBooks->get();
    }

    public function hydrate(){
        $this->data_kategori = DB::table('kategori')->get();

        //query buku
        $queryDataBooks = DB::table('books');
        if($this->from == "myCollection"){
            $queryDataBooks->where('user_id', Auth::user()->id);
        }else{
            $queryDataBooks->where('is_publikasi',true);
        }

        if($this->from == "purchased"){
            $queryDataBooks = DB::table('transactions')->where('status','PAID')->where('transactions.user_id', Auth::user()->id)
            ->leftJoin('books', 'books.id', 'transactions.book_id');
        }

        $this->data_books = $queryDataBooks->get();
    }
    
    public function render()
    {
        return view('livewire.pages.book.book');
    }

    public function modal_toggle(){
        $this->is_show = !$this->is_show;

        if($this->is_show == false){
            $this->clearFields();
        }

        $this->hydrate();
        $this->render();
    }
    public function modal_detail_toggle($id = null){
        if($id != null){
            $detail= BookModel::where('id',$id)->first();
            $this->insertBookView($id);
            $this->book_id = $detail->id;
            $this->user_id = $detail->user_id;
            $this->nama_penulis = $detail->nama_penulis;
            $this->user_id = $detail->user_id;
            $this->nama_kategori = $detail->category->nama_kategori;
            $this->judul_buku = $detail->judul_buku;
            $this->slug = $detail->slug;
            $this->isbn = $detail->isbn;
            $this->kategori = $detail->kategori;
            $this->deskripsi = $detail->deskripsi;
            $this->cover = $detail->cover;
            $this->file_book = $detail->file_book;
            $this->harga = $detail->harga;
            $this->is_free = $detail->is_free;
            $this->lisensi = $detail->lisensi;
            $this->is_publikasi = $detail->is_publikasi;

            if($this->from != "myCollection"){
                $this->purchased = Transaction::where('book_id', $detail->id)->where('user_id', Auth::user()->id)->where('status', 'PAID')->first() ?? null;
                if($this->purchased){
                    $this->is_free = true;
                }
            }else{
                $this->purchased = null;
            }
        }

        $this->is_show_detail = !$this->is_show_detail;

        if($this->is_show_detail == false){
            $this->clearFields();
        }
        
        $this->hydrate();
        $this->render();
    }

    public function modal_edit_toggle(){
        $this->is_show = !$this->is_show;
        $this->is_show_detail = !$this->is_show_detail;
        $this->is_edit = !$this->is_edit;

    }
    public function modal_pembayaran_toggle(){
        $this->is_show = false;
        $this->is_show_detail = false;
        $this->is_edit = false;
        $this->is_purchasing = false;

    }

    public function modal_save(){
        $rules = [
            'judul_buku' => 'required|string',
            'nama_penulis' => 'required|string',
            'isbn' => 'required|string',
            'kategori' => 'required|integer',
            'deskripsi' => 'required|string',
            'harga' => 'required|string',
            'is_free' => 'required',
            'lisensi' => 'required|string',
            'is_publikasi' => 'required',
        ];

        // Hanya terapkan validasi 'required' pada 'cover' dan 'file_book' jika is_edit bernilai false
        if (!$this->is_edit) {
            $rules['slug'] = 'required|string|unique:books';
            $rules['cover'] = 'required|max:10240'; // Ubah maksimum ukuran gambar sesuai kebutuhan
            $rules['file_book'] = 'required|mimes:pdf,epub|max:20240'; // Ubah maksimum ukuran file sesuai kebutuhan
        }   

        $validatedData = $this->validate($rules);


        if($this->is_edit == true){
            // Proses upload gambar dan file ke direktori yang sesuai

            if(isset($validatedData['cover'])){
                $coverPath = $validatedData['cover']->store('covers', 'public');
                BookModel::find($this->book_id)->update([
                    'cover' => $validatedData['cover']
                ]);
            }
    
            if(isset($validatedData['file_book'])){
                $fileBookPath = $validatedData['file_book']->store('files', 'public');
                BookModel::find($this->book_id)->update([
                    'file_book' => $validatedData['file_book']
                ]);
            }
            BookModel::find($this->book_id)->update([
                'judul_buku' => $validatedData['judul_buku'],
                'user_id' => Auth::user()->id,
                'nama_penulis' => $validatedData['nama_penulis'],
                'isbn' => $validatedData['isbn'],
                'kategori' => $validatedData['kategori'],
                'deskripsi' => $validatedData['deskripsi'],
                'harga' => $validatedData['harga'],
                'is_free' => $validatedData['is_free'],
                'lisensi' => $validatedData['lisensi'],
                'is_publikasi' => $validatedData['is_publikasi'],
            ]);
            $this->is_edit = !$this->is_edit;
             // Show a toast message indicating the successful update
            $toast = ToastHelper::makeToast("Book Updated Successfully");
            $this->dispatchBrowserEvent('show-toast', $toast);
        }else{
            // Simpan data buku ke dalam database
            $coverPath = $validatedData['cover']->store('covers', 'public');
            $fileBookPath = $validatedData['file_book']->store('files', 'public');

            BookModel::create([
                'judul_buku' => $validatedData['judul_buku'],
                'nama_penulis' => $validatedData['nama_penulis'],
                'user_id' => Auth::user()->id,
                'isbn' => $validatedData['isbn'],
                'slug' => $validatedData['slug'],
                'kategori' => $validatedData['kategori'],
                'deskripsi' => $validatedData['deskripsi'],
                'cover' => $coverPath,
                'file_book' => $fileBookPath,
                'harga' => $validatedData['harga'],
                'is_free' => $validatedData['is_free'],
                'lisensi' => $validatedData['lisensi'],
                'is_publikasi' => $validatedData['is_publikasi'],
            ]);
                    // Show a toast message indicating the successful update
                    $toast = ToastHelper::makeToast("Book Created Successfully");
                    $this->dispatchBrowserEvent('show-toast', $toast);
        }


        // Reset the form fields after successful update
        $this->modal_toggle(false);
        $this->clearFields();

    }

    public function updatedSearch($value){
        if($value != "" || $value != null){
            //query buku
            $queryDataBooks = DB::table('books')->whereRaw('LOWER(judul_buku) LIKE LOWER(?)', ['%'.$value.'%']);
            if($this->from == "myCollection"){
                $queryDataBooks->where('user_id', Auth::user()->id);
            }else{
                $queryDataBooks->where('is_publikasi',true);

            }

            if($this->from == "purchased"){
                $queryDataBooks = DB::table('transactions')->whereRaw('LOWER(judul_buku) LIKE LOWER(?)', ['%'.$value.'%'])->where('status','PAID')->where('transactions.user_id', Auth::user()->id)
                ->leftJoin('books', 'books.id', 'transactions.book_id');
            }

            $this->data_books = $queryDataBooks->get();
        }
    }


    public function updatedJudulBuku($value){
        $this->slug = str_replace(' ', '-',$value);
    }

    public function updatedSlug($value){
        $this->slug = str_replace(' ', '-',$value);
    }

    public function delete_book(){
        $delete = BookModel::find($this->book_id)->delete();
          // Show a toast message indicating the successful update
          $toast = ToastHelper::makeToast("Book Deleted Successfully");
          $this->dispatchBrowserEvent('show-toast', $toast);

          $this->is_show_detail = !$this->is_show_detail;
          $this->hydrate();
          $this->render();

          $this->clearFields();
    }

    public function purchase_book(){

        $book_id = $this->book_id;
        $user_id = Auth::user()->id;
        $urutan = Transaction::count();
        $tanggal = date('Ymd');

        $data = new \stdClass();
        // Membuat kode pembayaran dengan menggabungkan tanggal, ID buku, dan ID transaksi
        $data->kode_pembayaran = 'PP' . '.' . $tanggal . '.' . $user_id . '.' . $book_id . '.' . $urutan;
        $data->amount = $this->harga;
        $data->book_id = $book_id;
        $data->user_id = $user_id;
        $data->urutan = $urutan;
        $data->name = Auth::user()->name;
        $data->email = Auth::user()->email;
        $data->judul_buku = $this->judul_buku;

        $fix_data = $data;

        $create_invoice =  app('App\Http\Controllers\XenditController')->generateInvoice($fix_data);

        $date_ex = new DateTime($create_invoice['expiry_date']);
        $date_created = new DateTime($create_invoice['created']);

        $transaction = new Transaction;
        $transaction->book_id = $data->book_id;
        $transaction->user_id = $data->user_id;
        $transaction->amount = $data->amount;
        $transaction->kode_pembayaran = $data->kode_pembayaran;
        $transaction->status = $create_invoice['status'];
        $transaction->url_pembayaran = $create_invoice['invoice_url'];
        $transaction->kadaluarsa_pada = $date_ex->setTimezone(new DateTimeZone('Asia/Jakarta'))->format('Y-m-d H:i:s');
        $transaction->save();

        $this->transaction = $transaction;
        $this->is_purchasing = true;
        $this->is_show_detail = false;
        $toast = ToastHelper::makeToast("Invoice Berhasil Dibuat, Mohon Tunggu Hingga Jendela Pembayaran Terbuka");
        $this->dispatchBrowserEvent('show-toast', $toast);


        $toast = ToastHelper::makeToast("Jika Jendela Tidak Sengaja Tertutup, Kamu Dapat Mengaksesnya Di Halaman My Purchased",5000);
        $this->dispatchBrowserEvent('show-toast', $toast);

    }

    public function clearFields()
    {
        $this->book_id = '';
        $this->edit = '';
        $this->slug = '';
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

        $this->is_edit = false;
    }

    public function insertBookView($id){
        $book = BookModel::find($id);

        // Rekam view buku bersama dengan alamat IP pengguna
        $ipAddress = request()->ip();
        BookView::create([
            'book_id' => $id,
            'ip_address' => $ipAddress,
        ]);
    }
















    ///loading component

    // public function updatingCover(){
    //     $this->is_loading_cover = true;
    // }
    // public function updatedCover(){
    //     $this->is_loading_cover = false;
    // }
    // public function updatingFileBook(){
    //     $this->is_loading_book = true;
    // }
    // public function updatedFileBook(){
    //     $this->is_loading_book = false;
    // }
}
