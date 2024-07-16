<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RKantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('R_KANTOR')->insert([
            'ID_KANTOR' => 1,
            'KANTOR' => 'Kantor Pusat',
            'URAIAN_KANTOR' => 'Kantor pusat perusahaan',
        ]);
    }
}
