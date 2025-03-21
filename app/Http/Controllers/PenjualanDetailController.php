<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PenjualanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('penjualandetail.index', [
        //     'penjualandetail' => PenjualanDetail::get(),
        // ]);

        $penjualandetail = PenjualanDetail::with(['penjualan', 'barang'])->get();

        $penjualandetail->each(function ($detail) {
        $detail->totalharga_jual = $detail->barang->harga * $detail->jumlah;
        });

        return view('penjualandetail.index', compact('penjualandetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_jual)
    {
        $barang = Barang::all();
        return view('penjualandetail.create', compact('id_jual', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_jual = $request->input('id_jual');
        
        $request->validate([
            'barang.*.id_bar' => 'required|exists:barang,id_bar',
            'barang.*.jumlah' => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->barang as $dataBarang) {
                $barang = Barang::find($dataBarang['id_bar']);

                if (!$barang) {
                    throw new \Exception('Barang tidak ditemukan.');
                }

                if ($barang->stok_bar < $dataBarang['jumlah']) {
                    throw new \Exception('Stok tidak mencukupi untuk produk: ' . $barang->nama_barang);
                }

                PenjualanDetail::create([
                    'id_jual' => $id_jual,
                    'id_bar' => $dataBarang['id_bar'],
                    'jumlah' => $dataBarang['jumlah'],
                    'totalharga_jual' => $barang->harga * $dataBarang['jumlah'], 
                ]);

                $barang->stok_bar -= $dataBarang['jumlah'];
                $barang->save();
            }

            DB::commit();
            return redirect()->route('penjualandetail.index')->with('success', 'Transaksi berhasil disimpan.');
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
        $penjualandetail = PenjualanDetail::find($id);

        return view('penjualandetail.edit', [
            'penjualandetail' => $penjualandetail,
            'penjualan' => Penjualan::get(),
            'barang' => Barang::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_pd' => ['required'],
            'id_jual' => ['required'],
            'id_bar' => ['required'],
            'jumlah' => ['required']
        ]);

        $penjualandetail = PenjualanDetail::find($id);

        $penjualandetail->id_pd = $request->id_pd;
        $penjualandetail->id_jual = $request->id_jual;
        $penjualandetail->id_bar = $request->id_bar;
        $penjualandetail->jumlah = $request->jumlah;

        $penjualandetail->save();

        session()->flash('info', 'Data Berhasil Diperbarui');

        return redirect()->route('penjualandetail.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penjualandetail = PenjualanDetail::find($id);
        
        $penjualandetail->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('penjualandetail.index');
    }
}
