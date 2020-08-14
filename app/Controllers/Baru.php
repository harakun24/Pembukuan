<?php

namespace App\Controllers;

class Baru extends BaseController
{

    private $bio;
    function __construct()
    {
        $this->bio = new \App\Models\biotesModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        $biodata = $keyword ? $this->bio->search($keyword) : $this->bio;
        $current = $this->request->getVar('page_table') ? $this->request->getVar('page_table') : 1;
        $data = [
            'bio' => $biodata->paginate(5, 'table'),
            'pager' => $this->bio->pager,
            'current' => $current,
            'keyword'=>$keyword
        ];

        return view('test', $data);
    }
    public function add_bio()
    {
        $val = \Config\Services::validation();
        $data = [
            'val' => $val
        ];
        return view('siswa/tambah_siswa', $data);
    }
    public function save_bio()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'is_unique[biotes.email]|required',
                'errors' => [
                    'required' => 'email wajib diisi',
                    'is_unique' => 'gunakan email yang belum terpakai'
                ]
            ],
            'nama' => 'required'
        ])) {
            // $val=\Config\Services::validation();
            return redirect()->to('add')->withInput();
        } else {
            $var = $this->request->getVar();
            // dd($var);
            $this->bio->save([
                'nama' => $var['nama'],
                'email' => $var['email']
            ]);
            session()->setFlashData('insert',true);
            session()->setFlashData('data',$var['nama']);
            return redirect()->to('show');
        }
    }
    public function update_bio()
    {
        $var = $this->request->getVar();
        // dd($var);
        $va = $this->bio->find($var['id']);
        // dd($var);
        $strval = "";
        if ($var['email'] == $va['email']) {
            $strval = "required";
        } else
            $strval = "is_unique[biotes.email]|required";
        if (!$this->validate([
            'email' => [
                'rules' => $strval,
                'errors' => [
                    'required' => 'email wajib diisi',
                    'is_unique' => 'gunakan email yang belum terpakai'
                ]
            ],
            'nama' => 'required'
        ])) {
            // $val=\Config\Services::validation();
            return redirect()->to('edit/'.$var['id'])->withInput();
        } else {
            $this->bio->save([
                'id' => $var['id'],
                'nama' => $var['nama'],
                'email' => $var['email']
            ]);
            session()->setFlashData('update',true);
            
            return redirect()->to('show');
        }
    }
    public function hapus_bio($id){
        $this->bio->delete($id);
        session()->setFlashData('delete',true);
        return redirect()->to('/bio/show');
    }
    public function edit_bio($id)
    {
        $val = \Config\Services::validation();
        $data = [
            'bio' => $this->bio->find($id),
            'val' => $val
        ];
        return view('form-edit', $data);
    }
}
