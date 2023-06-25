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
        Schema::create('cuti', function (Blueprint $bp){
            $bp->id('id_cuti');
            $bp->string('nip');
            $bp->string('tgl_mulai');
            $bp->string('tgl_selesai');
            $bp->string('alasan');
            $bp->string('bukti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuti');
        
    }
};
