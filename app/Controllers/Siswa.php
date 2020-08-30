<?php

namespace App\Controllers;

class Siswa extends BaseController
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
        $faker = \Faker\Factory::create('id_ID');
        echo $faker->address;
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
    public function simpan_alamat($nis)
    {
        $va=$this->siswa->where('siswa_nis', $nis)->first();
        if ( $va == null)
            return redirect()->to('/siswa');
        if (!$this->validate([
            'siswa_telepon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '*Nomor telepon kosong',
                    'numeric' => '*isian angka'
                ]
            ],
            'siswa_jarak' => [
                'rules' => 'greater_than[0]',
                'errors' => [
                    'greater_than' => 'Tidak boleh 0'
                ]
            ]
        ])) {
            return redirect()->to('/siswa/' . $nis . '/detail/alamat')->withInput();
        } else {
            $var = $this->request->getVar();
            $this->siswa->update($va['siswa_id'], [
                'siswa_alamat' => $var['siswa_alamat'],
                'siswa_telepon' => $var['siswa_telepon'],
                'siswa_tinggal' => $var['siswa_tinggal'],
                'siswa_jarak' => $var['siswa_jarak'],
            ]);

            session()->setFlashData('update', true);
            session()->setFlashData('data', $va['siswa_nama']);
            return redirect()->to('/siswa/' . $nis . '/detail');
            // dd($var);
        }
    }
    public function simpan_penyakit($nis)
    {
        $va=$this->siswa->where('siswa_nis', $nis)->first();
        $var = $this->request->getVar();
        $this->siswa->update($va['siswa_id'], [
            'siswa_golongan_darah' => $var['siswa_golongan_darah'],
            'siswa_kelainan' => $var['siswa_kelainan'],
            'siswa_tinggi' => $var['siswa_tinggi'],
            'siswa_berat' => $var['siswa_berat'],
        ]);

        session()->setFlashData('update', true);
        session()->setFlashData('data', $va['siswa_nama']);
        return redirect()->to('/siswa/' . $nis . '/detail');
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
    public function penyakit($nis){
        $data = [
            'siswa'=>$this->siswa->where('siswa_nis',$nis)->first(),
            'penyakit'=>$this->penyakit->where('penyakit_siswa',$nis)->findAll()
        ];
        return view('siswa/penyakit_siswa',$data);
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
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first(),
            'penyakit'=>$this->penyakit->where('penyakit_siswa',$nis)->findAll()

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
