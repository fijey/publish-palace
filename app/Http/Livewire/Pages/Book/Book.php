<?php

namespace App\Http\Livewire\Pages\Book;

use Livewire\Component;
use App\Models\BookModel;
use Livewire\WithFileUploads; // Import namespace trait
use DB;
use App\Http\Livewire\Helper\ToastHelper;
use Auth;

class Book extends Component
{
    use WithFileUploads;
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

    //init data
    public $data_kategori;
    public $book_list;

    protected $listeners = [
        'close-modal' => 'modal_toggle',
        // 'render' => 'render'
    ];

    public function mount(){
        $this->data_kategori = DB::table('kategori')->get();
        $this->data_books = DB::table('books')->get();
        // dd($this->data_kategori);
    }

    public function hydrate(){
        $this->data_kategori = DB::table('kategori')->get();
        $this->data_books = DB::table('books')->get();
    }
    
    public function render()
    {
        return view('livewire.pages.book.book');
    }

    public function modal_toggle(){
        $this->is_show = !$this->is_show;

        if($this->is_show == false){
            $this->clearFields();
            $this->is_edit = !$this->is_edit;
        }

        $this->hydrate();
        $this->render();
    }
    public function modal_detail_toggle($id = null){
        if($id != null){
            $detail= BookModel::where('id',$id)->first();
            $this->book_id = $detail->id;
            $this->nama_kategori = $detail->category->nama_kategori;
            $this->judul_buku = $detail->judul_buku;
            $this->slug = $detail->slug;
            $this->nama_penulis = $detail->nama_penulis;
            $this->isbn = $detail->isbn;
            $this->kategori = $detail->kategori;
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

    public function modal_edit_toggle(){
        $this->is_show = !$this->is_show;
        $this->is_show_detail = !$this->is_show_detail;
        $this->is_edit = !$this->is_edit;

    }

    public function modal_save(){
        $rules = [
            'judul_buku' => 'required|string',
            'slug' => 'required|string|unique:books',
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
            $rules['cover'] = 'required|max:10240'; // Ubah maksimum ukuran gambar sesuai kebutuhan
            $rules['file_book'] = 'required|mimes:pdf,epub|max:20480'; // Ubah maksimum ukuran file sesuai kebutuhan
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
                'slug' => $validatedData['slug'],
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
