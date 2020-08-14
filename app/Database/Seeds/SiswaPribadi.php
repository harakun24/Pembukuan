<?php

namespace App\Database\Seeds;

class SiswaPribadi extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 200; $i++) {
            # code...
            $data = [
                'siswa_nis' => $faker->numberBetween($min=1000,$max=4000),
                'siswa_nama'    => $faker->name,
                'siswa_nick'=>$faker->lastname,
                'siswa_jk'=>$faker->randomElement($array=array('laki-laki','perempuan')),
                'siswa_tempat_lahir'=>$faker->city,
                'siswa_tangal_lahir'=>$faker->date($format='d-m-Y', $max='now'),
                'siswa_agama'=>$faker->randomElement($array=array('Islam','Protestan','Katolik','Hindu','Budha','Konghuchu')),
                'siswa_kewarganegaraan'=>'Indonesia',
                'siswa_order'=>$faker->numberBetween($min=1,$max=4),
                'siswa_kandung'=>$faker->numberBetween($min=0,$max=3),
                'siswa_tiri'=>$faker->numberBetween($min=0,$max=3),
                'siswa_angkat'=>$faker->numberBetween($min=0,$max=3),
                'siswa_status'=>$faker->randomElement($array=array('lengkap','yatim','piatu','yatim piatu')),
                'siswa_bahasa'=>$faker->randomElement($array=array('Bahasa Melayu','Bahasa Indonesia','Bahasa Jawa','Bahasa Inggris','Bahasa Korea')),
            ];

            // Simple Queries
            $siswa = new \App\Models\siswaModel();
            // $this->db->query(
            //     "INSERT INTO biotes (nama, email) VALUES(:nama:, :email:)",
            //     $data
            //     );
            $siswa->insert($data);
                // $this->db->table('users')->insert($data);
        }
        // Using Query Builder
    }
}
