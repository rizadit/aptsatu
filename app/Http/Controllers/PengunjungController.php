<?php
 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PengunjungModel;
use App\Models\LayananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PengunjungController extends Controller
{
    //
    public function index()
    {
        $jenisPengguna = DB::table('R_JENISPENGGUNA')->get();    
        return view('pengunjung', compact('jenisPengguna'));
    }

    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'TELEPON' => 'required',
            'NIK' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Check if pengunjung already exists
        $pengunjung = PengunjungModel::where('TELEPON', $request->TELEPON)
            ->orWhere('NIP_NIK', $request->NIK)
            ->first();

        if (!$pengunjung) {
            // Create new pengunjung
            $pengunjung = PengunjungModel::create([
                'TELEPON' => $request->TELEPON,
                'NIP_NIK' => $request->NIK,
                'NAMA' => $request->NAMA,
                'EMAIL' => $request->EMAIL,
                'INSTANSI_UNIT' => $request->INSTANSI_UNIT
            ]);
        }

        // Generate new antrian number
        $today = now()->toDateString();
        $lastAntrian = LayananModel::whereDate('DIBUAT_TANGGAL', $today)
            ->orderBy('ID_LAYANAN', 'desc')
            ->first();

        $newAntrianNumber = $lastAntrian ? $lastAntrian->NO_ANTRIAN + 1 : 1;

        // Create Layanan
        $layanan = LayananModel::create([
            'NO_ANTRIAN' => $newAntrianNumber,
            'ID_PENGUNJUNG' => $pengunjung->ID_PENGUNJUNG,
            'SUBJEK' => null,
            'ID_JENISDEPARTEMEN' => null,
            'ID_JENISLAYANAN' => null,
            'ID_JENISKANAL' => null,
            'ID_JENISPRIORITAS' => null,
            'ID_JENISTIKET' => null,
            'ID_JENISPENGGUNA' => null,
            'ID_JENISKELAMIN' => null,
            'DETAIL_UNITKERJA' => null,
            'INITIAL_AGENT' => null,
            'WAKTU_LAYANAN_MULAI' => null,
            'WAKTU_LAYANAN_SELESAI' => null,
            'PERTANYAAN' => null,
            'JAWABAN' => null,
            'NOTE' => null,
            'STATUS' => null,
            'DIBUAT_OLEH' => null,
            'DIBUAT_TANGGAL' => now()
        ]);
 
        // return response()->json(['success' => 'Data Berhasil Disimpan!', 'no_antrian' => $layanan->NO_ANTRIAN]);
        return redirect()->route('pengunjung.index')->with(['success' => 'Data Berhasil Disimpan!', 'no_antrian' => $layanan->NO_ANTRIAN]);
    }

    public function search(Request $request)
    {
        $telepon = $request->input('telepon');
        $data = PengunjungModel::where('TELEPON', $telepon)->first();

        if (!$data) {
            return response()->json(['success' => false, 'message' => 'No data found']);
        }

        return response()->json(['success' => true, 'data' => $data]);
    }
}
