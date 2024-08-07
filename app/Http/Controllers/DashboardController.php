<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboardAdmin()
    {
        $maleCount = LayananModel::where('ID_JENISKELAMIN', 15866)
            ->where('ID_KANTOR', session('user')->ID_KANTOR)
            ->count();

        $femaleCount = LayananModel::where('ID_JENISKELAMIN', 15867)
            ->where('ID_KANTOR', session('user')->ID_KANTOR)
            ->count();

        $otherCount = LayananModel::whereNotIn('ID_JENISKELAMIN', [15866, 15867])
            ->where('ID_KANTOR', session('user')->ID_KANTOR)
            ->count();

        $unitKerjaCounts = LayananModel::select('DETAIL_UNITKERJA', DB::raw('count(*) as count'))
            ->where('ID_KANTOR', session('user')->ID_KANTOR)
            ->groupBy('DETAIL_UNITKERJA')
            ->get();
        $unitKerjaLabels = $unitKerjaCounts->pluck('DETAIL_UNITKERJA')->toArray();
        $unitKerjaData = $unitKerjaCounts->pluck('count')->toArray();

        $jenisTiketCounts = LayananModel::join('R_JENISTIKET', 'T_LAYANAN.ID_JENISTIKET', '=', 'R_JENISTIKET.ID_JENISTIKET')
            ->select('R_JENISTIKET.URAIAN_JENISTIKET', DB::raw('count(*) as count'))
            ->where('T_LAYANAN.ID_KANTOR', session('user')->ID_KANTOR)
            ->groupBy('R_JENISTIKET.URAIAN_JENISTIKET')
            ->get();
        $jenisTiketLabels = $jenisTiketCounts->pluck('URAIAN_JENISTIKET')->toArray();
        $jenisTiketData = $jenisTiketCounts->pluck('count')->toArray();

        $jenisPrioritasCounts = LayananModel::join('R_JENISPRIORITAS', 'T_LAYANAN.ID_JENISPRIORITAS', '=', 'R_JENISPRIORITAS.ID_JENISPRIORITAS')
            ->select('R_JENISPRIORITAS.URAIAN_JENISPRIORITAS', DB::raw('count(*) as count'))
            ->where('T_LAYANAN.ID_KANTOR', session('user')->ID_KANTOR)
            ->groupBy('R_JENISPRIORITAS.URAIAN_JENISPRIORITAS')
            ->get();
        $jenisPrioritasLabels = $jenisPrioritasCounts->pluck('URAIAN_JENISPRIORITAS')->toArray();
        $jenisPrioritasData = $jenisPrioritasCounts->pluck('count')->toArray();

        $jenisKanalCounts = LayananModel::join('R_JENISKANAL', 'T_LAYANAN.ID_JENISKANAL', '=', 'R_JENISKANAL.ID_JENISKANAL')
            ->select('R_JENISKANAL.URAIAN_JENISKANAL', DB::raw('count(*) as count'))
            ->where('T_LAYANAN.ID_KANTOR', session('user')->ID_KANTOR)
            ->groupBy('R_JENISKANAL.URAIAN_JENISKANAL')
            ->get();
        $jenisKanalLabels = $jenisKanalCounts->pluck('URAIAN_JENISKANAL')->toArray();
        $jenisKanalData = $jenisKanalCounts->pluck('count')->toArray();

        $jenisLayananCounts = LayananModel::join('R_JENISLAYANAN', 'T_LAYANAN.ID_JENISLAYANAN', '=', 'R_JENISLAYANAN.ID_JENISLAYANAN')
            ->select('R_JENISLAYANAN.URAIAN_JENISLAYANAN', DB::raw('count(*) as count'))
            ->where('T_LAYANAN.ID_KANTOR', session('user')->ID_KANTOR)
            ->groupBy('R_JENISLAYANAN.URAIAN_JENISLAYANAN')
            ->get();
        $jenisLayananLabels = $jenisLayananCounts->pluck('URAIAN_JENISLAYANAN')->toArray();
        $jenisLayananData = $jenisLayananCounts->pluck('count')->toArray();

        return view('dashboard', compact('maleCount', 'femaleCount', 'otherCount', 'unitKerjaLabels', 'unitKerjaData', 'jenisTiketLabels', 'jenisTiketData', 'jenisKanalCounts', 'jenisPrioritasLabels', 'jenisPrioritasData', 'jenisKanalLabels', 'jenisKanalData', 'jenisLayananCounts'));
    }

    public function getGenderData()
    {
        $maleCount = LayananModel::where('ID_JENISKELAMIN', 15866)->count();
        $femaleCount = LayananModel::where('ID_JENISKELAMIN', 15867)->count();
        $otherCount = LayananModel::whereNotIn('ID_JENISKELAMIN', [15866, 15867])->count();

        return response()->json([
            'male' => $maleCount,
            'female' => $femaleCount,
            'other' => $otherCount
        ]);
    }
    public function getUnitKerjaData()
    {
        $unitKerjaData = LayananModel::select('DETAIL_UNITKERJA')
            ->groupBy('DETAIL_UNITKERJA')
            ->get()
            ->pluck('DETAIL_UNITKERJA')
            ->toArray();

        return response()->json([
            'unit_kerja' => $unitKerjaData
        ]);
    }
}
