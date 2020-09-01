<?php

namespace App\Controllers;

class Kegemaran extends BaseController
{
    private $siswa;
    private $kegemaran;
    function __construct()
    {
        $this->siswa = new \App\Models\siswaModel();
        $this->kegemaran = new \App\Models\kegemaranModel();
    }
    public function index($id)
    {
        return json_encode(['response' => $this->kegemaran->find($id)]);
    }
    public function simpan($nis)
    {
        $var = $this->request->getVar();
        $this->kegemaran->save([
            'kegemaran_siswa' => $nis,
            'kegemaran_nama' => $var['kegemaran_nama'],
            'kegemaran_role' => $var['kegemaran_role'],
        ]);
        // return json_encode(['status' => 200]);
        session()->setFlashData('insert', true);
        return redirect()->to('/siswa/' . $nis . '/detail/kegemaran');
    }
    public function perbarui($id)
    {
        $var = $this->request->getVar();
        $this->kegemaran->save([
            'kegemaran_id' => $var['kegemaran_id'],
            'kegemaran_siswa' => $var['kegemaran_siswa'],
            'kegemaran_nama' => $var['kegemaran_nama'],
        ]);
        // return json_encode(['status' => 200]);
        session()->setFlashData('update', true);
        return redirect()->to('/siswa/' . $var['kegemaran_siswa'] . '/detail/kegemaran');
    }
    public function hapus($id)
    {
        $this->kegemaran->delete($id);
        return json_encode(['status' => 200]);
    }
}
