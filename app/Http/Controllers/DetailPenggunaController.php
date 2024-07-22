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
use App\Models\RJenisTiket;

class DetailPenggunaController extends Controller
{
    //
    public function index()
    {
        // $layanans = LayananModel::all(); // Mengambil semua data dari tabel T_LAYANAN
        $layanans = LayananModel::join('R_PENGUNJUNG', 'T_LAYANAN.ID_PENGUNJUNG', '=', 'R_PENGUNJUNG.ID_PENGUNJUNG')
            ->select('T_LAYANAN.*', 'R_PENGUNJUNG.NAMA as NAMA_PENGUNJUNG')
            ->get();
            $departemen = RDepartemen::all();
            $kanal = RJenisKanal::all();
            $prioritas = JenisPrioritas::all();
            $tiket = RJenisTiket::all();
            $pengguna = JenisPengguna::all();
            $kelamin = JenisKelamin::all();
        return view('detail-pengguna', compact(['layanans','departemen','kanal','prioritas','tiket','pengguna','kelamin']));
    }

    public function getLayananDetail($id)
    {
        $layananQuery = LayananModel::join('R_PENGUNJUNG', 'T_LAYANAN.ID_PENGUNJUNG', '=', 'R_PENGUNJUNG.ID_PENGUNJUNG')
            ->select('T_LAYANAN.*', 'R_PENGUNJUNG.*');

        $layananQuery = $layananQuery->leftJoin('R_JENISKANAL', function ($join) {
            $join->on('T_LAYANAN.ID_JENISKANAL', '=', 'R_JENISKANAL.ID_JENISKANAL')
                ->whereNotNull('T_LAYANAN.ID_JENISKANAL');
        })
            ->addSelect('R_JENISKANAL.*');

        $layanan = $layananQuery->where('T_LAYANAN.ID_LAYANAN', $id)->first();
        $kanal = RJenisKanal::all();

        return response()->json([$layanan,$kanal]);
    }
}
