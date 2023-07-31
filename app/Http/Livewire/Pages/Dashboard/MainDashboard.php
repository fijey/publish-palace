<?php

namespace App\Http\Livewire\Pages\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\Transaction;
use App\Models\BookView;
use App\Models\BookModel;
use Auth;
use App\Http\Livewire\Helper\ToastHelper;

class MainDashboard extends Component
{
    public $is_show = false;
    public $is_show_withdraw = false;
    public $is_show_history = false;
    public $user;
    public $data_book;
    public $data_book_transaction;
    public $total_buku_dilihat = 0;
    public $total_buku_dibeli = 0;
    public $total_hasil_penjualan = 0;

    protected $listeners = [
        'close-modal' => 'modal_toggle',
        // 'render' => 'render'
    ];

    public function mount(){
        $this->user = Auth::user();
        $this->data_book = BookModel::where('user_id', Auth::user()->id)->get();
        $this->data_book_transaction = BookModel::leftJoin('transactions', 'transactions.book_id', 'books.id')
        ->where('books.user_id', Auth::user()->id)->where('transactions.status', 'PAID')->get();
        
        $this->total_buku_dilihat = 0;
        $this->total_buku_dibeli = 0;
        $this->total_hasil_penjualan = 0;
        foreach ($this->data_book as $key => $value) {
            $queryBook = Transaction::where('book_id', $value->id)->where('status','PAID');
            $this->total_buku_dilihat += BookView::uniqueViewsCount($value->id);
            $this->total_buku_dibeli += $queryBook->count();
            $this->total_hasil_penjualan += $queryBook->first()->amount;
        }

    }
    public function render()
    {
        return view('livewire.pages.dashboard.main-dashboard');
    }

    public function modal_toggle(){
        $this->is_show = !$this->is_show;

        if($this->is_show == true){
            $this->emit('open-modal', $this->is_show);
        }
    }

    public function modal_withdraw(){
        $this->is_show_withdraw = !$this->is_show_withdraw;
    }

    public function modal_history(){
        $this->data_book_transaction = BookModel::leftJoin('transactions', 'transactions.book_id', 'books.id')
        ->where('books.user_id', Auth::user()->id)->where('transactions.status', 'PAID')->get();
        $this->is_show_history = !$this->is_show_history;

    }

    public function request_withdraw(){
        $toast = ToastHelper::makeToast("Fitur Sedang Dalam Perbaikan, Saldo Yang Kamu Dapat Tidak Akan Hilang");
        $this->dispatchBrowserEvent('show-toast', $toast);
    }
}
