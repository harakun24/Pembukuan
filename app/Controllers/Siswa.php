<?php

namespace App\Controllers;

class Siswa extends BaseController
{
    private $siswa;
    private $penyakit;
    private $orangtua;
    private $kegemaran;
    private $beasiswa;
    private $tracker;
    function __construct()
    {
        $this->siswa = new \App\Models\siswaModel();
        $this->penyakit = new \App\Models\penyakitModel();
        $this->orangtua = new \App\Models\orangtuaModel();
        $this->kegemaran = new \App\Models\kegemaranModel();
        $this->beasiswa = new \App\Models\beasiswaModel();
        $this->tracker = new \App\Models\trackerModel();
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
    public function tes()
    {
        $data['siswa'] = $this->siswa->findAll();
        $length = 0;
        foreach ($data['siswa'] as $siswa) {
            $length++;
        }
        $j=0;
        for ($i = 0; $i < $length; $i++) {
            $temp = $this->penyakit->where('penyakit_siswa', $data['siswa'][$i]['siswa_nis'])->findAll();
            $data['siswa'][$i]['penyakit'] = "";
            foreach ($temp as $t) {
                $j=$i;
                $data['siswa'][$i]['penyakit'] .= $t['penyakit_nama'].', ';
            }
        }
        for ($i = 0; $i < $length; $i++) {
            $kesenian = $this->kegemaran->where(['kegemaran_siswa'=> $data['siswa'][$i]['siswa_nis'],'kegemaran_role'=>'kesenian'])->findAll();
            $olahraga = $this->kegemaran->where(['kegemaran_siswa'=> $data['siswa'][$i]['siswa_nis'],'kegemaran_role'=>'olahraga'])->findAll();
            $organisasi = $this->kegemaran->where(['kegemaran_siswa'=> $data['siswa'][$i]['siswa_nis'],'kegemaran_role'=>'organisasi'])->findAll();
            $lain_lain = $this->kegemaran->where(['kegemaran_siswa'=> $data['siswa'][$i]['siswa_nis'],'kegemaran_role'=>'lain-lain'])->findAll();
            $data['siswa'][$i]['kesenian'] = "";
            $data['siswa'][$i]['olahraga'] = "";
            $data['siswa'][$i]['organisasi'] = "";
            $data['siswa'][$i]['lain_lain'] = "";
            foreach ($kesenian as $t) {
                $data['siswa'][$i]['kesenian'] .= $t['kegemaran_nama'].', ';
            }
            foreach ($olahraga as $t) {
                $data['siswa'][$i]['olahraga'] .= $t['kegemaran_nama'].', ';
            }
            foreach ($organisasi as $t) {
                $data['siswa'][$i]['organisasi'] .= $t['kegemaran_nama'].', ';
            }
            foreach ($lain_lain as $t) {
                $data['siswa'][$i]['lain_lain'] .= $t['kegemaran_nama'].', ';
            }
        }
        for ($i = 0; $i < $length; $i++) {
            $data['siswa'][$i]['wali'] ="";
            $temp = $this->orangtua->where('orangtua_siswa', $data['siswa'][$i]['siswa_nis'])->findAll();
            foreach ($temp as $t) {
                $data['siswa'][$i]['wali'] .= $t['orangtua_nama'].'('.$t['orangtua_role'].') , ';
            }
        }
        echo json_encode(['status'=>$data['siswa']]);
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
    public function unduh(){
        return view('unduh.php');
    }
    public function simpan_alamat($nis)
    {
        $va = $this->siswa->where('siswa_nis', $nis)->first();
        if ($va == null)
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
                'siswa_alamat_wali' => $var['siswa_alamat_wali'],
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
        $va = $this->siswa->where('siswa_nis', $nis)->first();
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
    public function simpan_pendidikan($nis)
    {
        $va = $this->siswa->where('siswa_nis', $nis)->first();
        $var = $this->request->getVar();
        $this->siswa->update($va['siswa_id'], [
            'siswa_dari' => $var['siswa_dari'],
            'siswa_sebelum_tanggal' => $var['siswa_sebelum_tanggal'],
            'siswa_sebelum_sttb' => $var['siswa_sebelum_sttb'],
            'siswa_sebelum_lama' => $var['siswa_sebelum_lama'],
            'siswa_pindah_dari' => $var['siswa_pindah_dari'],
            'siswa_pindah_alasan' => $var['siswa_pindah_alasan'],
            'siswa_kelas' => $var['siswa_kelas'],
            'siswa_prodi' => $var['siswa_prodi'],
            'siswa_tanggal_diterima' => $var['siswa_tanggal_diterima'],
        ]);

        session()->setFlashData('update', true);
        session()->setFlashData('data', $va['siswa_nama']);
        return redirect()->to('/siswa/' . $nis . '/detail');
    }
    public function simpan_perkembangan($nis)
    {
        $va = $this->siswa->where('siswa_nis', $nis)->first();
        $var = $this->request->getVar();
        $this->siswa->update($va['siswa_id'], [
            'siswa_tanggal_meninggalkan' => $var['siswa_tanggal_meninggalkan'],
            'siswa_alasan_meninggalkan' => $var['siswa_alasan_meninggalkan'],
            'siswa_tamat_tahun' => $var['siswa_tamat_tahun'],
            'siswa_tamat_sttb' => $var['siswa_tamat_sttb'],
        ]);
        // dd($var);
        session()->setFlashData('update', true);
        session()->setFlashData('data', $va['siswa_nama']);
        return redirect()->to('/siswa/' . $nis . '/detail');
    }
    public function simpan_tracker($nis)
    {
        $va = $this->siswa->where('siswa_nis', $nis)->first();
        $var = $this->request->getVar();
        $this->siswa->update($va['siswa_id'], [
            'siswa_melanjutkan' => $var['siswa_melanjutkan'],
        ]);
        // dd($var);
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
    public function penyakit($nis)
    {
        $data = [
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first(),
            'penyakit' => $this->penyakit->where('penyakit_siswa', $nis)->findAll()
        ];
        return view('siswa/penyakit_siswa', $data);
    }
    public function orangtua($nis)
    {
        $data = [
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first(),
            'orangtua' => $this->orangtua->where('orangtua_siswa', $nis)->findAll(),
            'ayah' => $this->orangtua->where(['orangtua_siswa' => $nis, 'orangtua_role' => 'ayah'])->first(),
            'ibu' => $this->orangtua->where(['orangtua_siswa' => $nis, 'orangtua_role' => 'ibu'])->first(),
        ];
        return view('siswa/orangtua_siswa', $data);
    }
    public function kegemaran($nis)
    {
        $data = [
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first(),
            'kesenian' => $this->kegemaran->where(['kegemaran_siswa' => $nis, 'kegemaran_role' => 'kesenian'])->findAll(),
            'olahraga' => $this->kegemaran->where(['kegemaran_siswa' => $nis, 'kegemaran_role' => 'olahraga'])->findAll(),
            'organisasi' => $this->kegemaran->where(['kegemaran_siswa' => $nis, 'kegemaran_role' => 'organisasi'])->findAll(),
            'lain_lain' => $this->kegemaran->where(['kegemaran_siswa' => $nis, 'kegemaran_role' => 'lain-lain'])->findAll(),
        ];
        return view('siswa/kegemaran_siswa', $data);
    }
    public function perkembangan($nis)
    {
        $data = [
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first(),
            'beasiswa' => $this->beasiswa->where(['beasiswa_siswa' => $nis])->findAll(),
        ];
        return view('siswa/perkembangan_siswa', $data);
    }
    public function tracker($nis)
    {
        $data = [
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first(),
            'tracker' => $this->tracker->where(['tracker_siswa' => $nis])->findAll(),
        ];
        return view('siswa/tracker_siswa', $data);
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
            'penyakit' => $this->penyakit->where('penyakit_siswa', $nis)->findAll(),
            'orangtua' => $this->orangtua->where('orangtua_siswa', $nis)->findAll(),
            'kesenian' => $this->kegemaran->where(['kegemaran_siswa' => $nis, 'kegemaran_role' => 'kesenian'])->findAll(),
            'olahraga' => $this->kegemaran->where(['kegemaran_siswa' => $nis, 'kegemaran_role' => 'olahraga'])->findAll(),
            'organisasi' => $this->kegemaran->where(['kegemaran_siswa' => $nis, 'kegemaran_role' => 'organisasi'])->findAll(),
            'lain_lain' => $this->kegemaran->where(['kegemaran_siswa' => $nis, 'kegemaran_role' => 'lain-lain'])->findAll(),
            'beasiswa' => $this->beasiswa->where(['beasiswa_siswa' => $nis])->findAll(),
            'tracker' => $this->tracker->where(['tracker_siswa' => $nis])->findAll(),

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
    public function pendidikan($nis)
    {
        $val = \Config\Services::validation();

        $data = [
            'val' => $val,
            'siswa' => $this->siswa->where('siswa_nis', $nis)->first()
        ];
        return $data['siswa'] == null ? redirect()->to('/siswa/') : view('siswa/pendidikan_siswa', $data);
    }
}
