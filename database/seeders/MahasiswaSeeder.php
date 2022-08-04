<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_jenis_kelamin = ['L', 'P'];
        foreach (range(1,20) as $index => $value) {
            Mahasiswa::create([
                'nama' => 'Mahasiswa '. $value,
                'nim' => rand(10000, 33333),
                'umur' => rand(20, 30),
                'jenis_kelamin' => $list_jenis_kelamin[rand(0, 1)],
                'telp' => rand(82800000000, 85800000000),
                'tanggal_lahir' => now(),
                'alamat' => 'Alamat '. $value,
            ]);
        }
    }
}
