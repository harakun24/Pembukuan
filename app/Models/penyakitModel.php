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

    // protected $useTimestamps = true;
    // public function search($key)
    // {
    //     return $this->table('siswa')->like('siswa_nama', $key)
    //     ->orLike('siswa_nis',$key)
    //     ->orLike('siswa_nick',$key)
    //     ->orLike('siswa_kelas',$key)
    //     ->orLike('siswa_prodi',$key);
    // }
    
}
