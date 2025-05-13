<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Admin Sistem',
            'username' => 'admin',
            'password' => Hash::make('password'), // Ganti sesuai kebutuhan
            'alamat' => 'Jl. Contoh Alamat Admin',
            'no_hp' => '081234567890',
            'tgl_lahir' => '1990-01-01',
            'jabatan' => 'Administrator',
            'role' => 'admin',
            'jenis_kelamin' => 'laki_laki',
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
