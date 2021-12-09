<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->char('nip', 18)->primary();
            $table->string('nama', 100);
            $table->string('password', 64);
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->boolean('jenis_kelamin');
            $table->char('tahun_masuk', 4);
            $table->timestamps();
        });

        Schema::table('dosens', function (Blueprint $table) {
            // FK Agama
            $table->boolean('kode_agama');
            $table->foreign('kode_agama')->references('kode')->on('agamas');

            // FK Prodi
            $table->char('kode_prodi', 2);
            $table->foreign('kode_prodi')->references('kode')->on('program_studis');

            // FK Matkul
            $table->char('kode_matkul', 6);
            $table->foreign('kode_matkul')->references('kode')->on('matakuliahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosens');
    }
}
