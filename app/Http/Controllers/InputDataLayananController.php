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
use Illuminate\Support\Facades\DB;

class InputDataLayananController extends Controller
{
    public function index()
    {
        return view('input-data-layanan');
    }

    public function whatsapp($ID_KANAL)
    {
        $idKantor = session('user')->ID_KANTOR ?? session()->get('user-data')['idKantor'];
        $layanans = DB::table('T_LAYANAN')


            ->leftJoin('R_PENGUNJUNG', 'T_LAYANAN.ID_PENGUNJUNG', '=', 'R_PENGUNJUNG.ID_PENGUNJUNG')
            ->leftJoin('r_departemen', 'T_LAYANAN.ID_JENISDEPARTEMEN', '=', 'r_departemen.ID_DEPARTEMEN')
            ->leftJoin('R_JENISLAYANAN', 'T_LAYANAN.ID_JENISLAYANAN', '=', 'R_JENISLAYANAN.ID_JENISLAYANAN')
            ->leftJoin('R_JENISKANAL', 'T_LAYANAN.ID_JENISKANAL', '=', 'R_JENISKANAL.ID_JENISKANAL')
            ->leftJoin('R_JENISPRIORITAS', 'T_LAYANAN.ID_JENISPRIORITAS', '=', 'R_JENISPRIORITAS.ID_JENISPRIORITAS')
            ->leftJoin('R_JENISTIKET', 'T_LAYANAN.ID_JENISTIKET', '=', 'R_JENISTIKET.ID_JENISTIKET')
            ->leftJoin('R_JENISPENGGUNA', 'T_LAYANAN.ID_JENISPENGGUNA', '=', 'R_JENISPENGGUNA.ID_JENISPENGGUNA')
            ->leftJoin('R_JENISKELAMIN', 'T_LAYANAN.ID_JENISKELAMIN', '=', 'R_JENISKELAMIN.ID_JENISKELAMIN')
            ->where('T_LAYANAN.ID_KANTOR', $idKantor)
            ->where('T_LAYANAN.ID_JENISKANAL', $ID_KANAL)
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
        // return view('survey');
    }

    public function telepon($ID_KANAL)
    {
        $idKantor = session('user')->ID_KANTOR ?? session()->get('user-data')['idKantor'];
        $layanans = DB::table('T_LAYANAN')


            ->leftJoin('R_PENGUNJUNG', 'T_LAYANAN.ID_PENGUNJUNG', '=', 'R_PENGUNJUNG.ID_PENGUNJUNG')
            ->leftJoin('r_departemen', 'T_LAYANAN.ID_JENISDEPARTEMEN', '=', 'r_departemen.ID_DEPARTEMEN')
            ->leftJoin('R_JENISLAYANAN', 'T_LAYANAN.ID_JENISLAYANAN', '=', 'R_JENISLAYANAN.ID_JENISLAYANAN')
            ->leftJoin('R_JENISKANAL', 'T_LAYANAN.ID_JENISKANAL', '=', 'R_JENISKANAL.ID_JENISKANAL')
            ->leftJoin('R_JENISPRIORITAS', 'T_LAYANAN.ID_JENISPRIORITAS', '=', 'R_JENISPRIORITAS.ID_JENISPRIORITAS')
            ->leftJoin('R_JENISTIKET', 'T_LAYANAN.ID_JENISTIKET', '=', 'R_JENISTIKET.ID_JENISTIKET')
            ->leftJoin('R_JENISPENGGUNA', 'T_LAYANAN.ID_JENISPENGGUNA', '=', 'R_JENISPENGGUNA.ID_JENISPENGGUNA')
            ->leftJoin('R_JENISKELAMIN', 'T_LAYANAN.ID_JENISKELAMIN', '=', 'R_JENISKELAMIN.ID_JENISKELAMIN')
            ->where('T_LAYANAN.ID_KANTOR', $idKantor)
            ->where('T_LAYANAN.ID_JENISKANAL', $ID_KANAL)
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
        // return view('survey');
    }
}
