<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $fillable = ['tahun_ajaran', 'kode_matkul', 'nim_mahasiswa', 'kode_semester', 'nip_dosen'];
}
