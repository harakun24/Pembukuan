<?php

namespace App\Controllers;

class Penyakit extends BaseController
{
    private $siswa;
    private $penyakit;
    function __construct()
    {
        $this->siswa = new \App\Models\siswaModel();
        $this->penyakit = new \App\Models\penyakitModel();
    }
    public function index()
    {
    }
    public function simpan($nis)
    {
        $var = json_decode(file_get_contents('php://input'));
        $this->penyakit->save([
            'penyakit_siswa' => $nis,
            'penyakit_nama' => $var->penyakit_nama,
        ]);
        return json_encode(['status' => 200]);
    }
    public function perbarui($id)
    {
        $var = json_decode(file_get_contents('php://input'));
        $this->penyakit->save([
            'id' => $id,
            'penyakit_nama' => $var->penyakit_nama,
        ]);
        return json_encode(['status' => 200]);
    }
    public function hapus($id)
    {
        $this->penyakit->delete($id);
        return json_encode(['status' => 200]);
    }
}
