<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Merk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        // dd(Barang::get());
        return view('barang.index', [
            'barang' => Barang::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create', [
            'jenis' => Jenis::get(),
            'merk' => Merk::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('oke bang');
        $request->validate([
            'id_bar' => ['required'],
            'nama_bar' => ['required'],
            'id_jen' => ['required'],
            'id_merk' => ['required'],
            'harga' => ['required', 'numeric'],
            'stok_bar' => ['required', 'numeric']
        ]);

        $barang = new Barang();

        $barang->id_bar = $request->id_bar;
        $barang->nama_bar = $request->nama_bar;
        $barang->id_jen = $request->id_jen;
        $barang->id_merk = $request->id_merk;
        $barang->harga = $request->harga;
        $barang->stok_bar = $request->stok_bar;

        $barang->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('barang.index'); 
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
    public function edit($id)
    {
        // dd('anjay');

        $barang = Barang::find($id);

        return view('barang.edit', [
            'barang' => $barang,
            'jenis' => Jenis::get(),
            'merk' => Merk::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_bar' => ['required'],
            'nama_bar' => ['required'],
            'id_jen' => ['required'],
            'id_merk' => ['required'],
            'harga' => ['required', 'numeric'],
            'stok_bar' => ['required', 'numeric']
        ]);

        $barang = Barang::find($id);

        $barang->id_bar = $request->id_bar;
        $barang->nama_bar = $request->nama_bar;
        $barang->id_jen = $request->id_jen;
        $barang->id_merk = $request->id_merk;
        $barang->harga = $request->harga;
        $barang->stok_bar = $request->stok_bar;

        $barang->save();

        session()->flash('info', 'Data Berhasil Diperbarui');

        return redirect()->route('barang.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        
        $barang->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('barang.index');
    }
}
