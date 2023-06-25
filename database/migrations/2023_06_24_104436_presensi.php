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
        Schema::create('presensi', function (Blueprint $bp){
            $bp->id('id_presensi');
            $bp->string('nip');
            $bp->string('waktu_masuk')->nullable(true);
            $bp->string('lokasi_masuk')->nullable(true);
            $bp->string('ip_masuk')->nullable(true);
            $bp->string('waktu_tengah')->nullable(true);
            $bp->string('lokasi_tengah')->nullable(true);
            $bp->string('ip_tengah')->nullable(true);
            $bp->string('waktu_pulang')->nullable(true);
            $bp->string('lokasi_pulang')->nullable(true);
            $bp->string('ip_pulang')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi');
    }
};
