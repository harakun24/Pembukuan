<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orangtua extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'orangtua_id' 			=> [
				'type' 				=> 'int',
				'constraint' 		=> 11,
				'auto_increment' 	=> true
			],
			'orangtua_nama'			=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255
			],
			'orangtua_tempat_lahir'	=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255
			],
			'orangtua_tanggal_lahir'=> [
				'type' 				=> 'date'
			],
			'orangtua_agama'		=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 10
			],
			'orangtua_kewarganegaraan'	=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 50
			],
			'orangtua_pendidikan'	=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255
			],
			'orangtua_pekerjaan'	=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 50
			],
			'orangtua_penghasilan'	=> [
				'type' 				=> 'float'
			],
			'orangtua_telepon'		=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 50
			],
			'orangtua_status'		=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 10
			],
			'orangtua_role'			=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 5
			],
			'orangtua_siswa'		=> [
				'type' 				=> 'int'
			],
		]);
		$this->forge->addKey('orangtua_id', true);
		$this->forge->createTable('orangtua');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('orangtua');
	}
}
