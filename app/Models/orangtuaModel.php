<?php

namespace App\Models;

use CodeIgniter\Model;

class orangtuaModel extends Model
{
    protected $table = 'orangtua';
    protected $primaryKey = 'orangtua_id';
    protected $allowedFields =
    [
        'orangtua_nama',
        'orangtua_tempat_lahir',
        'orangtua_tanggal_lahir',
        'orangtua_agama',
        'orangtua_kewarganegaraan',
        'orangtua_pendidikan',
        'orangtua_pekerjaan',
        'orangtua_penghasilan',
        'orangtua_telepon',
        'orangtua_status',
        'orangtua_role',
        'orangtua_siswa',
        'orangtua_token',
    ];
    
}
