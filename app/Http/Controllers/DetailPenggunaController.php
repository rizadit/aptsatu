<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JenisKelamin;
use App\Models\JenisPengguna;
use Illuminate\Http\Request;
use App\Models\LayananModel;
use App\Models\RJenisKanal;
use App\Models\JenisPrioritas;
use App\Models\PengunjungModel;
use App\Models\RDepartemen;
use App\Models\RJenisLayanan;
use App\Models\RJenisTiket;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class DetailPenggunaController extends Controller
{
    //
    public function index()
    {
        // $layanans = LayananModel::all(); // Mengambil semua data dari tabel T_LAYANAN
        // $layanans = LayananModel::join('R_PENGUNJUNG', 'T_LAYANAN.ID_PENGUNJUNG', '=', 'R_PENGUNJUNG.ID_PENGUNJUNG')
        //     ->select('T_LAYANAN.*', 'R_PENGUNJUNG.NAMA as NAMA_PENGUNJUNG')
        //     ->get();
        $layanans = DB::table('T_LAYANAN')
            ->leftJoin('R_PENGUNJUNG', 'T_LAYANAN.ID_PENGUNJUNG', '=', 'R_PENGUNJUNG.ID_PENGUNJUNG')
            ->leftJoin('r_departemen', 'T_LAYANAN.ID_JENISDEPARTEMEN', '=', 'r_departemen.ID_DEPARTEMEN')
            ->leftJoin('R_JENISLAYANAN', 'T_LAYANAN.ID_JENISLAYANAN', '=', 'R_JENISLAYANAN.ID_JENISLAYANAN')
            ->leftJoin('R_JENISKANAL', 'T_LAYANAN.ID_JENISKANAL', '=', 'R_JENISKANAL.ID_JENISKANAL')
            ->leftJoin('R_JENISPRIORITAS', 'T_LAYANAN.ID_JENISPRIORITAS', '=', 'R_JENISPRIORITAS.ID_JENISPRIORITAS')
            ->leftJoin('R_JENISTIKET', 'T_LAYANAN.ID_JENISTIKET', '=', 'R_JENISTIKET.ID_JENISTIKET')
            ->leftJoin('R_JENISPENGGUNA', 'T_LAYANAN.ID_JENISPENGGUNA', '=', 'R_JENISPENGGUNA.ID_JENISPENGGUNA')
            ->leftJoin('R_JENISKELAMIN', 'T_LAYANAN.ID_JENISKELAMIN', '=', 'R_JENISKELAMIN.ID_JENISKELAMIN')
            ->select(
                'T_LAYANAN.*', 
                'R_PENGUNJUNG.*', 
                'r_departemen.*', 
                'R_JENISLAYANAN.*', 
                'R_JENISKANAL.*', 
                'R_JENISPRIORITAS.*', 
                'R_JENISTIKET.*', 
                'R_JENISPENGGUNA.*', 
                'R_JENISKELAMIN.*'
            )
            ->get();
        $departemen = RDepartemen::all();
        $kanal = RJenisKanal::all();
        $prioritas = JenisPrioritas::all();
        $tiket = RJenisTiket::all();
        $pengguna = JenisPengguna::all();
        $kelamin = JenisKelamin::all();
        return view('detail-pengguna', compact(['layanans', 'departemen', 'kanal', 'prioritas', 'tiket', 'pengguna', 'kelamin']));
    }

    public function getJenisLayanan($departemen_id)
    {
        $jenislayanan = RJenisLayanan::where('ID_DEPARTEMEN', $departemen_id)->get();
        return response()->json($jenislayanan);
    }
    public function getLayananDetail(Request $request)
    {
        $ID_LAYANAN = $request->input('ID_LAYANAN');

        $data = DB::table('T_LAYANAN')
            ->leftJoin('R_PENGUNJUNG', 'T_LAYANAN.ID_PENGUNJUNG', '=', 'R_PENGUNJUNG.ID_PENGUNJUNG')
            ->leftJoin('r_departemen', 'T_LAYANAN.ID_JENISDEPARTEMEN', '=', 'r_departemen.ID_DEPARTEMEN')
            ->leftJoin('R_JENISLAYANAN', 'T_LAYANAN.ID_JENISLAYANAN', '=', 'R_JENISLAYANAN.ID_JENISLAYANAN')
            ->leftJoin('R_JENISKANAL', 'T_LAYANAN.ID_JENISKANAL', '=', 'R_JENISKANAL.ID_JENISKANAL')
            ->leftJoin('R_JENISPRIORITAS', 'T_LAYANAN.ID_JENISPRIORITAS', '=', 'R_JENISPRIORITAS.ID_JENISPRIORITAS')
            ->leftJoin('R_JENISTIKET', 'T_LAYANAN.ID_JENISTIKET', '=', 'R_JENISTIKET.ID_JENISTIKET')
            ->leftJoin('R_JENISPENGGUNA', 'T_LAYANAN.ID_JENISPENGGUNA', '=', 'R_JENISPENGGUNA.ID_JENISPENGGUNA')
            ->leftJoin('R_JENISKELAMIN', 'T_LAYANAN.ID_JENISKELAMIN', '=', 'R_JENISKELAMIN.ID_JENISKELAMIN')
            ->select(
                'T_LAYANAN.*', 
                'R_PENGUNJUNG.*', 
                'r_departemen.*', 
                'R_JENISLAYANAN.*', 
                'R_JENISKANAL.*', 
                'R_JENISPRIORITAS.*', 
                'R_JENISTIKET.*', 
                'R_JENISPENGGUNA.*', 
                'R_JENISKELAMIN.*'
            )
            ->where('T_LAYANAN.ID_LAYANAN', $ID_LAYANAN)
            ->first();

        
        // Jika data tidak ditemukan, kembalikan respons dengan pesan
        if (!$data) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
        }

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'ID_LAYANAN' => 'required|integer',
            // 'NO_ANTRIAN' => 'required|string',
            // 'ID_PENGUNJUNG' => 'required|integer',
            'SUBJEK' => 'required|string',
            'ID_JENISDEPARTEMEN' => 'required|integer',
            'ID_JENISLAYANAN' => 'required|integer',
            'ID_JENISKANAL' => 'required|integer',
            'ID_JENISPRIORITAS' => 'required|integer',
            'ID_JENISTIKET' => 'required|integer',
            'ID_JENISPENGGUNA' => 'required|integer',
            'ID_JENISKELAMIN' => 'required|integer',
            'DETAIL_UNITKERJA' => 'nullable|string',
            'INITIAL_AGENT' => 'nullable|string',
            // 'WAKTU_LAYANAN_MULAI' => 'nullable|datetime',
            // 'WAKTU_LAYANAN_SELESAI' => 'nullable|datetime',
            // 'PERTANYAAN' => 'nullable|string',
            // 'JAWABAN' => 'nullable|string',
            // 'NOTE' => 'nullable|string',
            // 'STATUS' => 'required|boolean',
            // 'DIBUAT_OLEH' => 'nullable|string',
            // 'DIBUAT_TANGGAL' => 'nullable|datetime',
        ]);

        $layanan = LayananModel::find($request->ID_LAYANAN);
        if ($layanan) {
            $layanan->update($request->all());
            return response()->json(['success' => 'Data layanan berhasil diperbarui.']);
        }

        return response()->json(['error' => 'Data layanan tidak ditemukan.'], 404);
    }    
}
