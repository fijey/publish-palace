<?php 
namespace App\Http\Livewire\Helper;

class ToastHelper {
    public $text;
    public $duration;
    
    public function __construct($text = "new message", $duration = 3000) {
        $this->text = $text;
        $this->duration = $duration;
    }

    public static function makeToast($text = "new message", $duration = 3000){
        return new self($text, $duration);
    }
}