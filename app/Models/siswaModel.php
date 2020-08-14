<?php

namespace App\Models;

use CodeIgniter\Model;

class siswaModel extends Model
{
    protected $table = 'siswa';
    protected $allowedFields =
    [
        'siswa_nis',
        'siswa_nama',
        'siswa_nick',
        'siswa_jk',
        'siswa_tempat_tinggal',
        'siswa_tanggal_lahir',
        'siswa_agama',
        'siswa_kewarganegaraan',
        'siswa_order',
        'siswa_kandung',
        'siswa_tiri',
        'siswa_angkat',
        'siswa_status',
        'siswa_bahasa'
    ];
    // protected $useTimestamps = true;
    protected $primaryKey = 'siswa_nis';
    public function search($key)
    {
        return $this->table('siswa')->like('siswa_nama', $key);
    }
}
