<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_studi extends Model
{
    use HasFactory;

    // define primary key
    protected $primaryKey = 'kode';
    // primary is not incrementing
    public $incrementing = false;
    // primary is not integer
    protected $keyType = 'string';

    protected $fillable = ['kode', 'nama_prod', 'kode_jur'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jur');
    }

    function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'kode_prodi');
    }

    function dosens()
    {
        return $this->hasMany(Dosen::class, 'kode_prodi');
    }
}
