<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default(0); // Kolom "role" bertipe int dengan nilai default 0
            $table->string('role_user')->nullable(); // Kolom "role_user" bertipe varchar yang boleh bernilai null
            $table->string('description')->nullable(); // Kolom "description" bertipe varchar yang boleh bernilai null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role'); // Rollback: hapus kolom "role"
            $table->dropColumn('role_user'); // Rollback: hapus kolom "role_user"
            $table->dropColumn('description'); // Rollback: hapus kolom "description"
        });
    }
}
