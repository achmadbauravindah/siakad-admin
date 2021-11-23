<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramStudisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_studis', function (Blueprint $table) {
            $table->char('kode', 2)->primary();
            $table->string('nama_prod', 50);
            $table->timestamps();
        });
        // FK
        Schema::table('program_studis', function (Blueprint $table) {
            // Kalau mau buat fk diperhatika untuk tabel refresnsi dan tabel utama struktur harus sama yaitu jika char maka harus char
            $table->char('kode_jur', 2);
            $table->foreign('kode_jur')->references('kode')->on('jurusans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_studis');
    }
}
