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
        'siswa_alamat_wali',
        'siswa_telepon',
        'siswa_tinggal',
        'siswa_jarak',
        'siswa_kelainan',
        'siswa_golongan_darah',
        'siswa_tinggi',
        'siswa_berat',
        'siswa_dari',
        'siswa_sebelum_tanggal',
        'siswa_sebelum_sttb',
        'siswa_sebelum_lama',
        'siswa_pindah_dari',
        'siswa_pindah_alasan',
        'siswa_kelas',
        'siswa_prodi',
        'siswa_tanggal_diterima',
        'siswa_tanggal_meninggalkan',
        'siswa_alasan_meninggalkan',
        'siswa_tamat_tahun',
        'siswa_tamat_sttb',
        'siswa_melanjutkan',
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
