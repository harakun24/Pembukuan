<?php

namespace App\Models;

use CodeIgniter\Model;

class trackerModel extends Model
{
    protected $table = 'tracker';
    protected $primaryKey = 'tracker_id';
    protected $allowedFields =
    [
        'tracker_tanggal',
        'tracker_nama',
        'tracker_gaji',
        'tracker_siswa',
    ];
    
}
