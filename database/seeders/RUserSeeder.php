<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('R_USER')->insert([
            'USERNAME' => 'kantor',
            'PASSWORD' => Hash::make('password'), // Ganti dengan hash password yang sesuai
            'ROLE' => 'kantor',
            'ID_KANTOR' => 1, // Pastikan ID_KANTOR ini sesuai dengan yang ada di tabel R_KANTOR
            'CREATED_DATE' => now(),
            'IS_AKTIF' => true,
        ]);
    }
}
