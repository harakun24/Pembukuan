<?php

namespace App\Controllers;

class Orangtua extends BaseController
{
    private $siswa;
    private $orangtua;
    function __construct()
    {
        $this->siswa = new \App\Models\siswaModel();
        $this->orangtua = new \App\Models\orangtuaModel();
    }
    public function index($id)
    {
        return json_encode(['response' => $this->orangtua->find($id)]);
    }
    public function simpan($nis)
    {
        $var = $this->request->getVar();
        $this->orangtua->save([
            'orangtua_siswa' => $nis,
            'orangtua_nama' => $var['orangtua_nama'],
            'orangtua_tempat_lahir' => $var['orangtua_tempat_lahir'],
            'orangtua_tanggal_lahir' => $var['orangtua_tanggal_lahir'],
            'orangtua_agama' => $var['orangtua_agama'],
            'orangtua_kewarganegaraan' => $var['orangtua_kewarganegaraan'],
            'orangtua_pendidikan' => $var['orangtua_pendidikan'],
            'orangtua_pekerjaan' => $var['orangtua_pekerjaan'],
            'orangtua_penghasilan' => $var['orangtua_penghasilan'],
            'orangtua_telepon' => $var['orangtua_telepon'],
            'orangtua_status' => $var['orangtua_status'],
            'orangtua_role' => $var['orangtua_role'],
        ]);
        // return json_encode(['status' => 200]);
        session()->setFlashData('insert', true);
        return redirect()->to('/siswa/' . $nis . '/detail/orangtua');
    }
    public function perbarui($id)
    {
        $var = $this->request->getVar();
        $this->orangtua->save([
            'orangtua_id' => $id,
            'orangtua_siswa' => $var['orangtua_siswa'],
            'orangtua_nama' => $var['orangtua_nama'],
            'orangtua_tempat_lahir' => $var['orangtua_tempat_lahir'],
            'orangtua_tanggal_lahir' => $var['orangtua_tanggal_lahir'],
            'orangtua_agama' => $var['orangtua_agama'],
            'orangtua_kewarganegaraan' => $var['orangtua_kewarganegaraan'],
            'orangtua_pendidikan' => $var['orangtua_pendidikan'],
            'orangtua_pekerjaan' => $var['orangtua_pekerjaan'],
            'orangtua_penghasilan' => $var['orangtua_penghasilan'],
            'orangtua_telepon' => $var['orangtua_telepon'],
            'orangtua_status' => $var['orangtua_status'],
            'orangtua_role' => $var['orangtua_role'],
        ]);
        // return json_encode(['status' => 200]);
        session()->setFlashData('delete', true);
        return redirect()->to('/siswa/' . $var['orangtua_siswa'] . '/detail/orangtua');
    }
    public function hapus($id)
    {
        $this->orangtua->delete($id);
        return json_encode(['status' => 200]);
    }
}
