<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    // define primary key
    protected $primaryKey = 'kode';
    // primary is not incrementing
    public $incrementing = false;
    // primary is not integer
    protected $keyType = 'string';

    protected $fillable = ['kode', 'nama', 'sks', 'kode_status_matkul'];

    function status_matkul()
    {
        return $this->belongsTo(Status_matkul::class, 'kode_status_matkul');
    }
    function krses()
    {
        return $this->hasMany(Krs::class, 'kode_matkul');
    }

    function khses()
    {
        return $this->hasMany(Khs::class, 'kode_matkul');
    }

    function dosens()
    {
        return $this->hasMany(Dosen::class, 'kode_matkul');
    }
}
