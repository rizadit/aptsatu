<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PengunjungModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengunjungController extends Controller
{
    //
    public function index()
    {
        return view('pengunjung');
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'TELEPON'     => 'required',
            'NIK'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        PengunjungModel::create([
            'TELEPON'     => $request->TELEPON,
            'NIP_NIK'   => $request->NIK,
            'NAMA'   => $request->NAMA,
            'EMAIL'   => $request->EMAIL,
            'INSTANSI_UNIT'   => $request->INSTANSI_UNIT
        ]);

        //return response
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Berhasil Disimpan!',
        //     'data'    => $post
        // ]);
        return redirect()->route('pengunjung.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
