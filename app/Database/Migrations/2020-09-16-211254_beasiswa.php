<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Beasiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'beasiswa_id'			=> [
				'type' 				=> 'int',
				'constraint' 		=> 11,
				'auto_increment' 	=> true
			],
			'beasiswa_tahun'		=> [
				'type' 				=> 'int',
			],
			'beasiswa_kelas'		=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 20,
			],
			'beasiswa_dari'			=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255,
			],
			'beasiswa_siswa'		=> [
				'type' 				=> 'int',
			],
		]);
		$this->forge->addKey('beasiswa_id', true);
		$this->forge->createTable('beasiswa');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('beasiswa');
	}
}
