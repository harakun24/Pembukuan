<?php

namespace App\Database\Seeds;

class bio extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 200; $i++) {
            # code...
            $data = [
                'nama' => $faker->name,
                'email'    => $faker->email
            ];

            // Simple Queries
            $bio = new \App\Models\biotesModel();
            // $this->db->query(
            //     "INSERT INTO biotes (nama, email) VALUES(:nama:, :email:)",
            //     $data
            //     );
            $bio->save($data);
                // $this->db->table('users')->insert($data);
        }
        // Using Query Builder
    }
}
