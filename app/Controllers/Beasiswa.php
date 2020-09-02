<?php

namespace App\Controllers;

class Beasiswa extends BaseController
{
    private $siswa;
    private $beasiswa;
    function __construct()
    {
        $this->siswa = new \App\Models\siswaModel();
        $this->beasiswa = new \App\Models\beasiswaModel();
    }
    public function index($id)
    {
        return json_encode(['response' => $this->beasiswa->find($id)]);
    }
    public function simpan($nis)
    {
        $var = $this->request->getVar();
        $this->beasiswa->save([
            'beasiswa_siswa' => $nis,
            'beasiswa_tahun' => $var['beasiswa_tahun'],
            'beasiswa_kelas' => $var['beasiswa_kelas'],
            'beasiswa_dari' => $var['beasiswa_dari'],
        ]);
        // return json_encode(['status' => 200]);
        session()->setFlashData('insert', true);
        return redirect()->to('/siswa/' . $nis . '/detail/perkembangan');
    }
    public function perbarui($id)
    {
        $var = $this->request->getVar();
        $this->beasiswa->save([
            'beasiswa_id' => $id,
            'beasiswa_siswa' => $var['beasiswa_siswa'],
            'beasiswa_tahun' => $var['beasiswa_tahun'],
            'beasiswa_kelas' => $var['beasiswa_kelas'],
            'beasiswa_dari' => $var['beasiswa_dari'],
        ]);
        // return json_encode(['status' => 200]);
        session()->setFlashData('update', true);
        return redirect()->to('/siswa/' . $var['beasiswa_siswa'] . '/detail/perkembangan');
    }
    public function hapus($id)
    {
        $this->beasiswa->delete($id);
        return json_encode(['status' => 200]);
    }
}
