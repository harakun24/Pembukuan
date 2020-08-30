<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'siswa_id' 						=> [
				'type' 				=> 'int',
				'constraint' 		=> 11,
				'auto_increment' 	=> true
			],
			'siswa_nis' 					=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 11,
				'unique'		 	=> true
			],
			'siswa_nama' 					=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255
			],
			'siswa_nick' 					=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 30,
				'null'           	=> true
			],
			'siswa_jk' 						=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 9,
				'null'           	=> true
			],
			'siswa_tempat_lahir' 			=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255,
				'null'           	=> true
			],
			'siswa_tanggal_lahir' 			=> [
				'type' 				=> 'date',
				'null'           	=> true
			],
			'siswa_agama'	 				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 10,
				'null'           	=> true
			],
			'siswa_kewarganegaraan'	 		=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 50,
				'null'           	=> true
			],
			'siswa_order'	 				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_kandung'	 				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_tiri'	 				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_angkat'	 				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_status'	 				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 20,
				'null'           	=> true
			],
			'siswa_bahasa'	 				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 20,
				'null'           	=> true
			],
			'siswa_alamat'	 				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255,
				'null'           	=> true
			],
			'siswa_alamat_full'				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 10,
				'null'           	=> true
			],
			'siswa_rt'	 					=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_rw'	 					=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_kelurahan'				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_kecamatan' 				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_kabupaten' 				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_provinsi' 				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_telepon'	 				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 20,
				'null'           	=> true
			],
			'siswa_tinggal'	 				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 20,
				'null'           	=> true
			],
			'siswa_jarak'	 				=> [
				'type' 				=> 'float',
				'null'           	=> true
			],
			'siswa_golongan_darah'			=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 3,
				'null'           	=> true
			],
			'siswa_kelainan'				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255,
				'null'           	=> true
			],
			'siswa_tinggi'	 				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_berat'	 				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_dari'	 				=> [
				'type' 				=> 'varchar',
				'constraint'		=> 255,
				'null'           	=> true
			],
			'siswa_sebelum_tanggal'			=> [
				'type' 				=> 'date',
				'null'           	=> true
			],
			'siswa_sebelum_sttb'			=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 50,
				'null'           	=> true
			],
			'siswa_sebelum_lama'			=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_pindah_dari'				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255,
				'null'           	=> true
			],
			'siswa_pindah_alasan'			=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255,
				'null'           	=> true
			],
			'siswa_kelas'	 				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 20,
				'null'           	=> true
			],
			'siswa_prodi'	 				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 20,
				'null'           	=> true
			],
			'siswa_tanggal_diterima'		=> [
				'type' 				=> 'date',
				'null'           	=> true
			],
			'siswa_tanggal_meninggalkan'	=> [
				'type' 				=> 'date',
				'null'           	=> true
			],
			'siswa_alasan_meninggalkan'		=> [
				'type' 				=> 'varchar',
				'constraint'		=> 255,
				'null'           	=> true
			],
			'siswa_tamat_tahun'				=> [
				'type' 				=> 'int',
				'null'           	=> true
			],
			'siswa_tamat_sttb'				=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 50,
				'null'           	=> true
			],
			'created_at'					=> [
				'type' 				=> 'datetime',
				'null'           	=> true
			],
			'updated_at'					=> [
				'type' 				=> 'datetime',
				'null'           	=> true
			],

		]);
		$this->forge->addKey('siswa_id', true);
		$this->forge->createTable('siswa');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('siswa');
	}
}
