<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_matkul extends Model
{
    use HasFactory;

    // define primary key
    protected $primaryKey = 'kode';
    // primary is not incrementing
    public $incrementing = false;
    // primary is not integer
    protected $keyType = 'string';

    protected $fillable = ['kode', 'nama'];

    function matakuliahs()
    {
        return $this->hasMany(Matakuliah::class, 'kode_status_matkul');
    }
}
