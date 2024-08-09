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
use App\Models\Survey;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    //
    public function index()
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
        return view('survey', compact(['layanans', 'departemen', 'kanal', 'prioritas', 'tiket', 'pengguna', 'kelamin']));
        // return view('survey');
    }

    public function surveyPengunjung()
    {
        $idKantor = session('user')->ID_KANTOR ?? session()->get('user-data')['idKantor'];
        $layanans = DB::table('T_LAYANAN')


            ->leftJoin('R_PENGUNJUNG', 'T_LAYANAN.ID_PENGUNJUNG', '=', 'R_PENGUNJUNG.ID_PENGUNJUNG')
            ->leftJoin('surveys', 'T_LAYANAN.ID_LAYANAN', '=', 'surveys.ID_LAYANAN')
            ->where('T_LAYANAN.ID_KANTOR', $idKantor)
            // ->where('T_LAYANAN.STATUS', 1)
            ->where(function ($query) {
                $query->where('surveys.STATUS', '!=', 1)
                    ->orWhereNull('surveys.STATUS');
            })
            ->select(
                'T_LAYANAN.*',
                'R_PENGUNJUNG.*'
            )
            ->get();
        $departemen = RDepartemen::all();
        $kanal = RJenisKanal::all();
        $prioritas = JenisPrioritas::all();
        $tiket = RJenisTiket::all();
        $pengguna = JenisPengguna::all();
        $kelamin = JenisKelamin::all();
        return view('survey-pengunjung', compact(['layanans', 'departemen', 'kanal', 'prioritas', 'tiket', 'pengguna', 'kelamin']));
    }

    public function create($id)
    {
        $idKantor = session('user')->ID_KANTOR ?? session()->get('user-data')['idKantor'];
        $layanans = DB::table('T_LAYANAN')
            ->leftJoin('R_PENGUNJUNG', 'T_LAYANAN.ID_PENGUNJUNG', '=', 'R_PENGUNJUNG.ID_PENGUNJUNG')
            ->where('T_LAYANAN.ID_KANTOR', $idKantor)
            ->where('T_LAYANAN.ID_LAYANAN', $id)
            ->select(
                'T_LAYANAN.*',
                'R_PENGUNJUNG.*'
            )
            ->get();
        return view('list-survey', compact(['id','layanans']));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'administrasi_layanan' => 'required|integer|between:1,5',
            'prosedur_layanan' => 'required|integer|between:1,5',
            'waktu_layanan' => 'required|integer|between:1,5',
            'biaya_layanan' => 'required|integer|between:1,5',
            'kompetensi_petugas' => 'required|integer|between:1,5',
            'kesopanan_petugas' => 'required|integer|between:1,5',
            'kualitas_sarana' => 'required|integer|between:1,5',
            'ketersediaan_kanal' => 'required|integer|between:1,5',
            'saran_kritik' => 'nullable|string|max:255',
        ]);

        // Buat instance Survey baru dan simpan data
        $survey = new Survey();
        $survey->administrasi_layanan = $request->administrasi_layanan;
        $survey->prosedur_layanan = $request->prosedur_layanan;
        $survey->waktu_layanan = $request->waktu_layanan;
        $survey->biaya_layanan = $request->biaya_layanan;
        $survey->kompetensi_petugas = $request->kompetensi_petugas;
        $survey->kesopanan_petugas = $request->kesopanan_petugas;
        $survey->kualitas_sarana = $request->kualitas_sarana;
        $survey->ketersediaan_kanal = $request->ketersediaan_kanal;
        $survey->saran_kritik = $request->saran_kritik;
        $survey->ID_LAYANAN = $request->ID_LAYANAN;
        $survey->STATUS = 1;

        // Simpan data ke database
        $survey->save();

        // Redirect ke halaman sukses atau halaman yang diinginkan
        return redirect()->route('survey-pengunjung')->with('success', 'Survey berhasil disimpan!');
    }

    public function show(Survey $survey)
    {
        return view('list-survey', compact('survey'));
    }

    public function edit(Survey $survey)
    {
        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        $request->validate([
            'administrasi_layanan' => 'required|integer',
            'prosedur_layanan' => 'required|integer',
            'waktu_layanan' => 'required|integer',
            'biaya_layanan' => 'required|integer',
            'kompetensi_petugas' => 'required|integer',
            'kesopanan_petugas' => 'required|integer',
            'kualitas_sarana' => 'required|integer',
            'ketersediaan_kanal' => 'required|integer',
            'saran_kritik' => 'nullable|string',
        ]);

        $survey->update($request->all());
        return redirect()->route('surveys.index')->with('success', 'Survey updated successfully.');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index')->with('success', 'Survey deleted successfully.');
    }
}
