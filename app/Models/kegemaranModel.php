<?php

namespace App\Models;

use CodeIgniter\Model;

class kegemaranModel extends Model
{
    protected $table = 'kegemaran';
    protected $primaryKey = 'kegemaran_id';
    protected $allowedFields =
    [
        'kegemaran_nama',
        'kegemaran_siswa',
        'kegemaran_role',
    ];
    
}
