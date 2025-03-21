<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $penjualan = Penjualan::all();
        $barang = Barang::all();
        return view('penjualan.index', compact('penjualan', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all(); 
        $penjualan = Penjualan::all(); 
        $lastSale = Penjualan::orderBy('tanggal_jual', 'desc')->first();
        $newId = 'JUAL' . str_pad(($lastSale ? ((int) substr($lastSale->id_jual, 4)) + 1 : 1), 2, '0', STR_PAD_LEFT);
        return view('penjualan.create', compact('barang', 'penjualan', 'newId'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_jual' => ['required', 'string'],
            'tanggal_jual' => 'required|date',
            'barang.*.id_bar' => 'required|exists:barang,id_bar',
            'barang.*.jumlah' => 'required|integer|min:1',
        ]);
    
        try {
            DB::beginTransaction();
    
            $id_jual = $request->input('id_jual');
    
            $penjualan = Penjualan::where('id_jual', $id_jual)->first();
    
            if (!$penjualan) {
                $penjualan = Penjualan::create([
                    'id_jual' => $id_jual,
                    'tanggal_jual' => $request->input('tanggal_jual'),
                    'totalharga_jual' => 0, 
                ]);
            }
    
            $totalHarga = 0;
    
            foreach ($request->barang as $dataBarang) {
                $barang = Barang::find($dataBarang['id_bar']);
    
                if (!$barang) {
                    throw new \Exception('Barang tidak ditemukan.');
                }
    
                if ($barang->stok_bar < $dataBarang['jumlah']) {
                    throw new \Exception('Stok tidak mencukupi untuk produk: ' . $barang->nama_bar);
                }
    
                $subtotal = $barang->harga * $dataBarang['jumlah'];
                $totalHarga += $subtotal;
    
                PenjualanDetail::create([
                    'id_pd' => Str::uuid(),
                    'id_jual' => $id_jual,
                    'id_bar' => $dataBarang['id_bar'],
                    'jumlah' => $dataBarang['jumlah'],
                    'totalharga_jual' => $subtotal,
                ]);
    
                $barang->stok_bar -= $dataBarang['jumlah'];
                $barang->save();
            }
    
            $penjualan->update(['totalharga_jual' => $totalHarga]);
    
            DB::commit();
            return redirect()->route('penjualan.index')->with('success', 'Transaksi berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
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
        $penjualan = Penjualan::find($id);

        return view('penjualan.edit', [
            'penjualan' => $penjualan,
            'barang' => Barang::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_jual' => ['required'],
            'tanggal_jual' => ['required', 'date'],
            'totalharga_jual' => ['required', 'numeric']
        ]);

        $penjualan = Penjualan::find($id);

        $penjualan->id_jual = $request->id_jual;
        $penjualan->tanggal_jual = $request->tanggal_jual;
        $penjualan->totalharga_jual = $request->totalharga_jual;

        $penjualan->save();

        session()->flash('info', 'Data Berhasil Diperbarui');

        return redirect()->route('penjualan.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
    try {
        // Hapus data yang terkait di penjualan_detail terlebih dahulu
        PenjualanDetail::where('id_jual', $id)->delete();
        
        // Hapus data di penjualan
        Penjualan::where('id_jual', $id)->delete();

        DB::commit();
        session()->flash('danger', 'Data Berhasil Dihapus');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    return redirect()->route('penjualan.index');
    }
}