<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PenjualanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PenjualanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan_detail = PenjualanDetail::all();
        return response()->json([
            'status' => true,
            'message' => 'Data Detail Penjualan',
            'data' => $penjualan_detail
        ]);
    
        return response()->json($penjualan_detail);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jual' => 'required',
            'id_bar' => 'required',
            'jumlah' => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validasi error',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            $penjualan_detail = PenjualanDetail::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'validasi berhasil',
                'data' => $penjualan_detail
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penjualan_detail = PenjualanDetail::findOrFail($id);
        return response()->json([
            'status' => 'true',
            'message' => 'Data Founded',
            'data' => $penjualan_detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'id_jual' => 'required',
            'id_bar' => 'required',
            'jumlah' => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validasi error',
                    'errors' => $validator->errors()
                ], 422);
            }
            
        $penjualan_detail = PenjualanDetail::findOrFail($id);
        $penjualan_detail->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'updated data',
            'data' => $penjualan_detail
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penjualan_detail = PenjualanDetail::findOrFail($id);
        $penjualan_detail->delete();
        return response()->json([
            'status'=>true,
            'message'=>'data deleted'
        ], 204);
    }
}
