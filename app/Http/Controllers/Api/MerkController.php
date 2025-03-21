<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merk = Merk::all();
        return response()->json([
            'status' => true,
            'message' => 'Data Merk',
            'data' => $merk
        ]);
    
        return response()->json($merk);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_merk' => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validasi error',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            $merk = Merk::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'validasi berhasil',
                'data' => $merk
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $merk = Merk::findOrFail($id);
        return response()->json([
            'status' => 'true',
            'message' => 'Data Founded',
            'data' => $merk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_merk' => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validasi error',
                    'errors' => $validator->errors()
                ], 422);
            }
            
        $merk = Merk::findOrFail($id);
        $merk->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'updated data',
            'data' => $merk
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();
        return response()->json([
            'status'=>true,
            'message'=>'data deleted'
        ], 204);
    }
}
