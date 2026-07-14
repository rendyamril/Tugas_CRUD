<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{
    protected $table            = 'matakuliah';
    protected $primaryKey       = 'kode_mk';
    // Gunakan 'string' karena primary key bukan auto-increment integer
    protected $returnType       = 'array';
    protected $allowedFields    = ['kode_mk', 'nama_mk', 'sks', 'semester'];
}