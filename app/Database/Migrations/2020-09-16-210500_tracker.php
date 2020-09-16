<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tracker extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'tracker_id'			=> [
				'type' 				=> 'int',
				'constraint' 		=> 11,
				'auto_increment' 	=> true
			],
			'tracker_tanggal'		=> [
				'type' 				=> 'date'
			],
			'tracker_nama'			=> [
				'type' 				=> 'varchar',
				'constraint' 		=> 255
			],
			'tracker_gaji'			=> [
				'type' 				=> 'float'
			],
			'tracker_siswa'			=> [
				'type' 				=> 'int'
			],
		]);
		$this->forge->addKey('tracker_id', true);
		$this->forge->createTable('tracker');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tracker');
	}
}
