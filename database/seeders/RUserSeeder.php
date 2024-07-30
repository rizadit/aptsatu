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
        $users = [
            [
                'USERNAME' => 'kantor',
                'PASSWORD' => Hash::make('password'), // Ganti dengan hash password yang sesuai
                'ROLE' => 'kantor',
                'ID_KANTOR' => 1, // Pastikan ID_KANTOR ini sesuai dengan yang ada di tabel R_KANTOR
                'CREATED_DATE' => now(),
                'IS_AKTIF' => true,
            ],
            [
                'USERNAME' => 'adminpusat',
                'PASSWORD' => Hash::make('password'), // Ganti dengan hash password yang sesuai
                'ROLE' => 'admin',
                'ID_KANTOR' => 1, // Pastikan ID_KANTOR ini sesuai dengan yang ada di tabel R_KANTOR
                'CREATED_DATE' => now(),
                'IS_AKTIF' => true,
            ],
            [
                'USERNAME' => 'superadmin',
                'PASSWORD' => Hash::make('superadminpassword'), // Ganti dengan hash password yang sesuai
                'ROLE' => 'superadmin',
                'ID_KANTOR' => 1, // Pastikan ID_KANTOR ini sesuai dengan yang ada di tabel R_KANTOR
                'CREATED_DATE' => now(),
                'IS_AKTIF' => true,
            ],
            [
                'USERNAME' => 'kanwil',
                'PASSWORD' => Hash::make('password'), // Ganti dengan hash password yang sesuai
                'ROLE' => 'kantor',
                'ID_KANTOR' => 2, // Pastikan ID_KANTOR ini sesuai dengan yang ada di tabel R_KANTOR
                'CREATED_DATE' => now(),
                'IS_AKTIF' => true,
            ],
            [
                'USERNAME' => 'adminkanwil',
                'PASSWORD' => Hash::make('password'), // Ganti dengan hash password yang sesuai
                'ROLE' => 'admin',
                'ID_KANTOR' => 2, // Pastikan ID_KANTOR ini sesuai dengan yang ada di tabel R_KANTOR
                'CREATED_DATE' => now(),
                'IS_AKTIF' => true,
            ],
            [
                'USERNAME' => 'kpknl',
                'PASSWORD' => Hash::make('password'), // Ganti dengan hash password yang sesuai
                'ROLE' => 'kantor',
                'ID_KANTOR' => 3, // Pastikan ID_KANTOR ini sesuai dengan yang ada di tabel R_KANTOR
                'CREATED_DATE' => now(),
                'IS_AKTIF' => true,
            ],
            [
                'USERNAME' => 'adminkpknl',
                'PASSWORD' => Hash::make('password'), // Ganti dengan hash password yang sesuai
                'ROLE' => 'admin',
                'ID_KANTOR' => 3, // Pastikan ID_KANTOR ini sesuai dengan yang ada di tabel R_KANTOR
                'CREATED_DATE' => now(),
                'IS_AKTIF' => true,
            ]
        ];

        foreach ($users as $user) {
            DB::table('R_USER')->updateOrInsert(
                ['USERNAME' => $user['USERNAME'],'ID_KANTOR' => $user['ID_KANTOR']], // Kondisi untuk memeriksa apakah data sudah ada
                $user // Data yang akan diinsert atau diupdate
            );
        }
    }
}
