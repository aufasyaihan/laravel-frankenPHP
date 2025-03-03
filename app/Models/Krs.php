<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';
    protected $primaryKey = 'id_krs';

    protected $fillable = [
        'nim',
        'kode matakuliah',
        'matakuliah',
        'semester',
        'tahunakademik'
    ];

    public $timestamps = false;
}
