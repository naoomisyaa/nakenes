<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('merk.index', [
            'merk' => Merk::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_merk' => ['required'],
            'nama_merk' => ['required']
        ]);

        $merk = new Merk();

        $merk->id_merk = $request->id_merk;
        $merk->nama_merk = $request->nama_merk;

        $merk->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('merk.index'); 
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
        $merk = Merk::find($id);

        return view('merk.edit', [
            'merk' => $merk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_merk' => ['required'],
            'nama_merk' => ['required']
        ]);

        $merk = Merk::find($id);
        

        $merk->id_merk = $request->id_merk;
        $merk->nama_merk = $request->nama_merk;
        
        $merk->save();

        session()->flash('info', 'Data Berhasil Diperbarui');

        return redirect()->route('merk.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merk = Merk::find($id);
        
        $merk->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('merk.index');
    }
}
