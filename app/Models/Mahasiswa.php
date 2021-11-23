<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // define primary key
    protected $primaryKey = 'nim';
    // primary is not incrementing
    public $incrementing = false;
    // primary is not integer
    protected $keyType = 'string';

    protected $fillable = ['nim', 'nama', 'password', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 'kode_agama', 'kode_prodi'];
}
