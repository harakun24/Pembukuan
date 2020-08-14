<?php

namespace App\Models;

use CodeIgniter\Model;

class biotesModel extends Model
{
    protected $table = 'biotes';
    protected $allowedFields=['nama','email'];
    protected $useTimestamps = true;
    public function search($key){
        return $this->table('biotes')->like('nama',$key);
    }
}
