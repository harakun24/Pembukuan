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
        $biodata = $keyword ? $this->siswa->search($keyword) : $this->siswa;
        $current = $this->request->getVar('page_table') ? $this->request->getVar('page_table') : 1;
        $data = [
            'siswa' => $biodata->paginate(5, 'table'),
            'pager' => $this->siswa->pager,
            'current' => $current,
            'keyword'=>$keyword
        ];
        return view('siswa/list_siswa',$data);
    }
    public function tambah()
    {
        $val = \Config\Services::validation();
        $data = [
            'val' => $val
        ];
        return view('siswa/tambah_siswa',$data);
    }
    public function ubah($nis)
    {
        $val = \Config\Services::validation();

        $data = [
            'val' => $val,
            'siswa'=>$this->siswa->find($nis)
        ];
        return view('siswa/edit_siswa',$data);
    }
    public function simpan(){
        // $faker = \Faker\Factory::create('id_ID');
        // for ($i=0; $i < 1; $i++) { 
        //     echo $faker->city;
        // }
        $var=$this->request->getVar();
        $this->siswa->insert([
            'siswa_nis'=>$var['siswa_nis'],
            'siswa_nama'=>$var['siswa_nama'],
            'siswa_nick'=>$var['siswa_nick'],
            'siswa_jk'=>$var['siswa_jk'],
            'siswa_tempat_lahir'=>$var['siswa_tempat_lahir'],
            'siswa_tanggal_lahir'=>$var['siswa_tanggal_lahir'],
            'siswa_agama'=>$var['siswa_agama'],
            'siswa_kewarganegaraan'=>$var['siswa_kewarganegaraan'],
            'siswa_order'=>$var['siswa_order'],
            'siswa_kandung'=>$var['siswa_kandung'],
            'siswa_tiri'=>$var['siswa_tiri'],
            'siswa_angkat'=>$var['siswa_angkat'],
            'siswa_status'=>$var['siswa_status'],
            'siswa_bahasa'=>$var['siswa_bahasa'],
        ]);

        return redirect()->to('tambah');
    }
}
