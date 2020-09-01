<?php

namespace App\Models;

use CodeIgniter\Model;

class penyakitModel extends Model
{
    protected $table = 'penyakit';
    protected $allowedFields =
    [
        'penyakit_siswa',
        'penyakit_nama',
    ];
    
}
