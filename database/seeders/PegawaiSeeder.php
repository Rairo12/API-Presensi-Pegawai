<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PegawaiModel;
use Illuminate\Support\Facades\Hash;


class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PegawaiModel::query()->create([
            'nip'       => '12211521',
            'password'  => Hash::make('1234'),
            'nama'      => 'Rafli Nugroho',
            'gender'    => 'Pria',
            'jabatan'   => 'Mahasiswa',
            'alamat'    => 'Jl.Rumah Komp.Rumah No.Rumah',
            'no_hp'     => '081234567890',
            'email'     => 'rafli12tkj@gmail.com',
            'foto'      => 'profile.png',
        ]);
    }
}
