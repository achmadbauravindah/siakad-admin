<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Authenticatable
{
    use HasFactory;

    // define primary key
    protected $primaryKey = 'nip';
    // primary is not incrementing
    public $incrementing = false;
    // primary is not integer
    protected $keyType = 'string';

    protected $fillable = ['nip', 'nama', 'password', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 'tahun_masuk', 'kode_agama', 'kode_prodi', 'kode_matkul'];

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'kode_agama');
    }

    function program_studi()
    {
        return $this->belongsTo(Program_studi::class, 'kode_prodi');
    }

    function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_matkul');
    }

    function krses()
    {
        return $this->hasMany(Krs::class, 'nip_dosen');
    }

    function khses()
    {
        return $this->hasMany(Khs::class, 'nip_dosen');
    }
}
