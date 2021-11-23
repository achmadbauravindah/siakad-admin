<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->char('kode', 2)->primary();
            $table->string('nama_jur', 50);
            $table->timestamps();
        });

        // FK
        Schema::table('jurusans', function (Blueprint $table) {
            // Kalau mau buat fk diperhatika untuk tabel refresnsi dan tabel utama struktur harus sama yaitu jika char maka harus char
            $table->char('kode_fak', 2);
            $table->foreign('kode_fak')->references('kode')->on('fakultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusans');
    }
}
