<?php

namespace App\Models;

use CodeIgniter\Model;

class siswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'siswa_id';
    protected $useTimestamps = true;
    protected $allowedFields =
    [
        'siswa_nis',
        'siswa_nama',
        'siswa_nick',
        'siswa_jk',
        'siswa_tempat_lahir',
        'siswa_tanggal_lahir',
        'siswa_agama',
        'siswa_kewarganegaraan',
        'siswa_order',
        'siswa_kandung',
        'siswa_tiri',
        'siswa_angkat',
        'siswa_status',
        'siswa_bahasa',
        'siswa_alamat',
        'siswa_telepon',
        'siswa_tinggal',
        'siswa_jarak',
    ];

    // protected $useTimestamps = true;
    public function search($key)
    {
        return $this->table('siswa')->like('siswa_nama', $key)
        ->orLike('siswa_nis',$key)
        ->orLike('siswa_nick',$key)
        ->orLike('siswa_kelas',$key)
        ->orLike('siswa_prodi',$key);
    }
    
}
