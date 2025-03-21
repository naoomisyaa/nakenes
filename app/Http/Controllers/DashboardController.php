<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPenjualanHariIni = Penjualan::whereDate('tanggal_jual', today())->sum('totalharga_jual');

        $barangHabis = Barang::habis()->get();

        $penjualanPerBulan = Penjualan::select(
            DB::raw("DATE_FORMAT(tanggal_jual, '%Y-%m') as bulan"),
            DB::raw("SUM(totalharga_jual) as total")
        )
        ->groupBy('bulan')
        ->orderBy('bulan', 'asc')
        ->get();

        $lastRecord = Penjualan::latest('id_jual')->first();
        $newId = $lastRecord 
            ? 'JUAL' . str_pad((int)substr($lastRecord->id_jual, 4) + 1, 3, '0', STR_PAD_LEFT) 
            : 'JUAL001';

        
        $jenisBarang = Jenis::all(); // Pastikan ini ada
        $barang = DB::table('barang')->get();

    // Pastikan variabel barang tidak false atau null
    if (!$barang) {
        $barang = collect(); // Mengubahnya menjadi koleksi kosong
    }
            
        return view('dashboard', compact('totalPenjualanHariIni', 'barangHabis', 'penjualanPerBulan', 'newId', 'jenisBarang', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
