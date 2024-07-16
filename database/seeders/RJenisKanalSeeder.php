<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RJenisKanalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('r_jenis_kanal')->insert([
            ['ID_JENISKANAL' => '15853', 'URAIAN_JENISKANAL' => "Pertanyaan\r\nPertanyaan", 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENISKANAL' => '15854', 'URAIAN_JENISKANAL' => 'Pengaduan dugaan pelanggaran peraturan perundang-undangan di bidang kekayaan negara, penilaian dan lelang oleh masyarakat', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENISKANAL' => '15855', 'URAIAN_JENISKANAL' => 'Pengaduan pelayanan dan sarana prasarana', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENISKANAL' => '15856', 'URAIAN_JENISKANAL' => 'Pengaduan pelanggaran kode etik/disipilin pegawai', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENISKANAL' => '15857', 'URAIAN_JENISKANAL' => 'Keluhan', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENISKANAL' => '15858', 'URAIAN_JENISKANAL' => 'Saran', 'created_at' => $now, 'updated_at' => $now],
            ['ID_JENISKANAL' => '15859', 'URAIAN_JENISKANAL' => 'Permintaan atas layanan sesuai dengan katalog layanan', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
