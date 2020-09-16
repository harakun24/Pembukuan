<?php

namespace App\Database\Seeds;

class SiswaPribadi extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 200; $i++) {
            # code...
            $dt = $faker->dateTimeBetween($startDate = '-17 years', $endDate = '-10 years');
            $date = $dt->format("Y-m-d");
            $data = [
                'siswa_nis' => $faker->numberBetween($min = 1000, $max = 9000) ,
                'siswa_nama'    => $faker->name,
                'siswa_nick' => $faker->lastname,
                'siswa_jk' => $faker->randomElement($array = array('laki-laki', 'perempuan')),
                'siswa_tempat_lahir' => $faker->city,
                'siswa_tanggal_lahir' => $date,
                'siswa_agama' => $faker->randomElement($array = array('Islam', 'Protestan', 'Katolik', 'Hindu', 'Budha', 'Konghuchu')),
                'siswa_kewarganegaraan' => 'Indonesia',
                'siswa_order' => $faker->numberBetween($min = 1, $max = 4),
                'siswa_kandung' => $faker->numberBetween($min = 0, $max = 3),
                'siswa_tiri' => $faker->numberBetween($min = 0, $max = 3),
                'siswa_angkat' => $faker->numberBetween($min = 0, $max = 3),
                'siswa_status' => $faker->randomElement($array = array('lengkap', 'yatim', 'piatu', 'yatim piatu')),
                'siswa_bahasa' => $faker->randomElement($array = array('Bahasa Melayu', 'Bahasa Indonesia', 'Bahasa Jawa', 'Bahasa Inggris', 'Bahasa Korea')),
                'siswa_alamat' => $faker->address,
                'siswa_alamat_wali' => $faker->address,
                'siswa_telepon' => $faker->phoneNumber,
                'siswa_tinggal' => $faker->randomElement($array = array('Orang tua', 'Saudara', 'Asrama', 'Kost')),
                'siswa_jarak' => $faker->randomDigitNotNull,
                'siswa_golongan_darah' => $faker->randomElement($array = array('O', 'A', 'B', 'AB')),
                'siswa_tinggi' => $faker->numberBetween($min = 155, $max = 182),
                'siswa_berat' => $faker->numberBetween($min = 48, $max = 80),
            ];


            $siswa = new \App\Models\siswaModel();
           
            $siswa->insert($data);
        }
    }
}
