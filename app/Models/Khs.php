<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    use HasFactory;

    protected $fillable = ['nilai_tugas', 'nilai_uts', 'nilai_uas', 'tahun_ajaran', 'kode_matkul', 'nim_mahasiswa', 'kode_semester', 'nip_dosen'];
}
