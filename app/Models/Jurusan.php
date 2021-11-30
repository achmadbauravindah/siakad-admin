<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    // define primary key
    protected $primaryKey = 'kode';
    // primary is not incrementing
    public $incrementing = false;
    // primary is not integer
    protected $keyType = 'string';

    protected $fillable = ['kode', 'nama_jur', 'kode_fak'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'kode_fak');
    }

    function program_studis()
    {
        return $this->hasMany(Program_studi::class, 'kode_jur');
    }
}
