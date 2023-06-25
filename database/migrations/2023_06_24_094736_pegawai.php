<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $bp){
            $bp->string('nip')->primary();
            $bp->string('password');
            $bp->string('nama');
            $bp->string('gender');
            $bp->string('jabatan');
            $bp->string('alamat');
            $bp->string('no_hp');
            $bp->string('email');
            $bp->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
