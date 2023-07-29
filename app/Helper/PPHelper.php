<?php

namespace App\Helper;

class PPHelper {
    public static function formatCurrency($angka, $mata_uang = "IDR") {
        // Menampilkan angka dalam format mata uang dengan pemisah ribuan (,) dan 2 desimal (.)
        $hasil = number_format($angka, 2, '.', ',');
        return $mata_uang . ' ' . $hasil;
    }
}