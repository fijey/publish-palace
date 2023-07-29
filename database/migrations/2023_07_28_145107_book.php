<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Book extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->string('nama_penulis');
            $table->string('isbn');
            $table->integer('kategori');
            $table->text('deskripsi');
            $table->string('cover');
            $table->string('file_book');
            $table->string('harga');
            $table->boolean('is_free');
            $table->string('lisensi');
            $table->boolean('is_publikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
