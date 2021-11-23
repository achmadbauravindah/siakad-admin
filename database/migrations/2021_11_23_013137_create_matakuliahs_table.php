<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->char('kode', 6)->primary();
            $table->string('nama', 100);
            $table->char('sks', 2);
            $table->timestamps();
        });
        Schema::table('matakuliahs', function (Blueprint $table) {
            $table->char('kode_status_matkul', 1);
            $table->foreign('kode_status_matkul')->references('kode')->on('status_matkuls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matakuliahs');
    }
}
