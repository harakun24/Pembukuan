<?php

namespace App\Controllers;

class Tracker extends BaseController
{
    private $siswa;
    private $tracker;
    function __construct()
    {
        $this->siswa = new \App\Models\siswaModel();
        $this->tracker = new \App\Models\trackerModel();
    }
    public function index($id)
    {
        return json_encode(['response' => $this->tracker->find($id)]);
    }
    public function simpan($nis)
    {
        $var = $this->request->getVar();
        $this->tracker->save([
            'tracker_siswa' => $nis,
            'tracker_tahun' => $var['tracker_tahun'],
            'tracker_kelas' => $var['tracker_kelas'],
            'tracker_dari' => $var['tracker_dari'],
        ]);
        // return json_encode(['status' => 200]);
        session()->setFlashData('insert', true);
        return redirect()->to('/siswa/' . $nis . '/detail/perkembangan');
    }
    public function perbarui($id)
    {
        $var = $this->request->getVar();
        $this->tracker->save([
            'tracker_id' => $id,
            'tracker_siswa' => $var['tracker_siswa'],
            'tracker_tahun' => $var['tracker_tahun'],
            'tracker_kelas' => $var['tracker_kelas'],
            'tracker_dari' => $var['tracker_dari'],
        ]);
        // return json_encode(['status' => 200]);
        session()->setFlashData('update', true);
        return redirect()->to('/siswa/' . $var['tracker_siswa'] . '/detail/perkembangan');
    }
    public function hapus($id)
    {
        $this->tracker->delete($id);
        return json_encode(['status' => 200]);
    }
}
