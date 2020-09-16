<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kegemaran extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kegemaran_id'			=> [
				'type' 				=> 'int',
				'constraint' 		=> 11,
				'auto_increment' 	=> true
			],
			'kegemaran_nama'		=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255,
			],
			'kegemaran_siswa'		=> [
				'type' 				=> 'int'
			],
			'kegemaran_role'		=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 20
			],
		]);
		$this->forge->addKey('kegemaran_id', true);
		$this->forge->createTable('kegemaran');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('kegemaran');
	}
}
