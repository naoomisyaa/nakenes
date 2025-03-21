<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return response()->json([
            'status' => true,
            'message' => 'Data Barang',
            'data' => $barang
        ]);
    
        return response()->json($barang);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_bar' => 'required',
            'id_jen' => 'required',
            'id_merk' => 'required',
            'harga' => 'required',
            'stok_bar' => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validasi error',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            $barang = Barang::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'validasi berhasil',
                'data' => $barang
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);
        return response()->json([
            'status' => 'true',
            'message' => 'Data Founded',
            'data' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_bar' => 'required',
            'id_jen' => 'required',
            'id_merk' => 'required',
            'harga' => 'required',
            'stok_bar' => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validasi error',
                    'errors' => $validator->errors()
                ], 422);
            }
            
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'updated data',
            'data' => $barang
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json([
            'status'=>true,
            'message'=>'data deleted'
        ], 204);
    }
}