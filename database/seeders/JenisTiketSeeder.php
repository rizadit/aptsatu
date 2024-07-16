<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JenisTiketSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('r_jenis_tiket')->insert([
            ['ID_JENIS_TIKET' => '15853', 'JENIS_TIKET' => "Pertanyaan\r\nPertanyaan", 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENIS_TIKET' => '15854', 'JENIS_TIKET' => 'Pengaduan dugaan pelanggaran peraturan perundang-undangan di bidang kekayaan negara, penilaian dan lelang oleh masyarakat', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENIS_TIKET' => '15855', 'JENIS_TIKET' => 'Pengaduan pelayanan dan sarana prasarana', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENIS_TIKET' => '15856', 'JENIS_TIKET' => 'Pengaduan pelanggaran kode etik/disipilin pegawai', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENIS_TIKET' => '15857', 'JENIS_TIKET' => 'Keluhan', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENIS_TIKET' => '15858', 'JENIS_TIKET' => 'Saran', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENIS_TIKET' => '15859', 'JENIS_TIKET' => 'Permintaan atas layanan sesuai dengan katalog layanan', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}