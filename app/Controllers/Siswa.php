<?php

namespace App\Controllers;

class Siswa extends BaseController
{
    private $siswa;
    function __construct()
    {
        $this->siswa = new \App\Models\siswaModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        $biodata = $keyword ? $this->siswa->search($keyword)->orderBy('updated_at', 'DESC') : $this->siswa->orderBy('updated_at', 'DESC');
        $current = $this->request->getVar('page_table') ? $this->request->getVar('page_table') : 1;
        $data = [
            'siswa' => $biodata->paginate(5, 'table'),
            'pager' => $this->siswa->pager,
            'current' => $current,
            'keyword' => $keyword
        ];
        return view('siswa/list_siswa', $data);
    }
    public function tambah()
    {
        $val = \Config\Services::validation();
        $data = [
            'val' => $val
        ];
        return view('siswa/tambah_siswa', $data);
    }
    public function ubah($nis)
    {
        $val = \Config\Services::validation();

        $data = [
            'val' => $val,
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first()
        ];
        return $data['siswa'] == null ? redirect()->to('/siswa/') : view('siswa/edit_siswa', $data);
    }
    public function tes($id)
    {
        echo $this->siswa->where('siswa_nis', $id)->countAllResults();
    }
    public function simpan()
    {
        if (!$this->validate([
            'siswa_nis' => [
                'rules' => 'is_unique[siswa.siswa_nis]|required|numeric',
                'errors' => [
                    'required' => '*NIS wajib diisi',
                    'is_unique' => '*sudah terpakai',
                    'numeric' => '*isian angka'
                ]
            ]
        ])) {
            // $val=\Config\Services::validation();
            return redirect()->to('tambah')->withInput();
        } else {
            $var = $this->request->getVar();
            $this->siswa->save([
                'siswa_nis' => $var['siswa_nis'],
                'siswa_nama' => $var['siswa_nama'],
                'siswa_nick' => $var['siswa_nick'],
                'siswa_jk' => $var['siswa_jk'],
                'siswa_tempat_lahir' => $var['siswa_tempat_lahir'],
                'siswa_tanggal_lahir' => $var['siswa_tanggal_lahir'],
                'siswa_agama' => $var['siswa_agama'],
                'siswa_kewarganegaraan' => $var['siswa_kewarganegaraan'],
                'siswa_order' => $var['siswa_order'],
                'siswa_kandung' => $var['siswa_kandung'],
                'siswa_tiri' => $var['siswa_tiri'],
                'siswa_angkat' => $var['siswa_angkat'],
                'siswa_status' => $var['siswa_status'],
                'siswa_bahasa' => $var['siswa_bahasa'],
            ]);

            session()->setFlashData('insert', true);
            session()->setFlashData('data', $var['siswa_nama']);
            return redirect()->to('/siswa/' . $var['siswa_nis'] . '/detail');
        }
    }
    public function perbarui()
    {
        $var = $this->request->getVar();
        $va = $this->siswa->find($var['siswa_id']);
        $strval = "required|numeric";

        if ($var['siswa_nis'] != $va['siswa_nis'])
            $strval .= "|is_unique[siswa.siswa_nis]";

        if (!$this->validate([
            'siswa_nis' => [
                'rules' => $strval,
                'errors' => [
                    'required' => '*NIS wajib diisi',
                    'is_unique' => '*sudah terpakai',
                    'numeric' => '*isian angka'
                ]
            ]
        ])) {
            // $val=\Config\Services::validation();
            return redirect()->to($va['siswa_nis'] . '/detail/pribadi')->withInput();
        } else {
            $this->siswa->update($va['siswa_id'], [
                'siswa_nis' => $var['siswa_nis'],
                'siswa_nama' => $var['siswa_nama'],
                'siswa_nick' => $var['siswa_nick'],
                'siswa_jk' => $var['siswa_jk'],
                'siswa_tempat_lahir' => $var['siswa_tempat_lahir'],
                'siswa_tanggal_lahir' => $var['siswa_tanggal_lahir'],
                'siswa_agama' => $var['siswa_agama'],
                'siswa_kewarganegaraan' => $var['siswa_kewarganegaraan'],
                'siswa_order' => $var['siswa_order'],
                'siswa_kandung' => $var['siswa_kandung'],
                'siswa_tiri' => $var['siswa_tiri'],
                'siswa_angkat' => $var['siswa_angkat'],
                'siswa_status' => $var['siswa_status'],
                'siswa_bahasa' => $var['siswa_bahasa'],
            ]);

            session()->setFlashData('update', true);
            session()->setFlashData('data', $var['siswa_nama']);
            return redirect()->to('/siswa/' . $var['siswa_nis'] . '/detail');
        }
    }
    public function hapus($nis)
    {
        $val = $this->siswa->where('siswa_nis', $nis)->first();
        $this->siswa->delete($val['siswa_id']);
        session()->setFlashData('delete', true);
        return redirect()->to('/siswa/');
    }
    public function detail($nis)
    {
        $data = [
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first()
        ];
        return $data['siswa'] == null ? redirect()->to('/siswa/') : view('siswa/detail_siswa', $data);
    }
    public function alamat($nis)
    {
        $val = \Config\Services::validation();

        $data = [
            'val' => $val,
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first()
        ];
        return $data['siswa'] == null ? redirect()->to('/siswa/') : view('siswa/alamat_siswa', $data);
    }
}
