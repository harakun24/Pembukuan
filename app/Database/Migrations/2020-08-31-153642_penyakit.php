<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyakit extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	 				=> [
				'type' 				=> 'int',
				'constraint' 		=> 11,
				'auto_increment' 	=> true
			],
			'penyakit_siswa'		=> [
				'type' 				=> 'int'
			],
			'penyakit_nama'			=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('penyakit');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('penyakit');
	}
}
