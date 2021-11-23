<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // define primary key
    protected $primaryKey = 'nip';
    // primary is not incrementing
    public $incrementing = false;
    // primary is not integer
    protected $keyType = 'string';

    protected $fillable = ['nip', 'nama', 'password', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 'tahun_masuk', 'kode_agama', 'kode_prodi'];
}
