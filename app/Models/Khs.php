<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    use HasFactory;

    protected $fillable = ['nilai_tugas', 'nilai_uts', 'nilai_uas', 'tahun_ajaran', 'kode_matkul', 'nim_mahasiswa', 'kode_semester', 'nip_dosen'];

    function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_matkul');
    }
    function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim_mahasiswa');
    }
    function semester()
    {
        return $this->belongsTo(Semester::class, 'kode_semester');
    }
    function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip_dosen');
    }
}
