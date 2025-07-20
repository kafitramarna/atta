<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KosController extends Controller
{
    public function index()
    {
        return response()->json(Kos::all());
    }

    public function show($id)
    {
        $kos = Kos::find($id);
        if (!$kos) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json($kos);
    }

    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'harga' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                    'status_code' => 422,
                ], 422);
            }

            $kos = Kos::create($request->all());
            return response()->json($kos, 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create kos',
                'error' => $e->getMessage(),
                'status_code' => 500,
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $kos = Kos::find($id);
        if (!$kos) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $kos->update($request->all());
        return response()->json($kos);
    }

    public function destroy($id)
    {
        $kos = Kos::find($id);
        if (!$kos) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $kos->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
