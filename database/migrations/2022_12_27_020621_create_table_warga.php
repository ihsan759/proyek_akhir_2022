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
        Schema::create('warga', function (Blueprint $table) {
            $table->string('nik', 16)->primary();
            $table->string('nama', 50);
            $table->integer('gender');
            $table->integer('id_agama');
            $table->string('gol_darah', 2);
            $table->string('id_kk', 16);
            $table->date('tgl_lahir');
            $table->string('pekerjaan', 50);
            $table->integer('status_perkawinan');
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
        Schema::dropIfExists('warga');
    }
};
