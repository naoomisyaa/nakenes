<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jenis.index', [
            'jenis' => Jenis::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_jen' => ['required'],
            'nama_jen' => ['required']
        ]);

        $jenis = new Jenis();

        $jenis->id_jen = $request->id_jen;
        $jenis->nama_jen = $request->nama_jen;

        $jenis->save();

        session()->flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('jenis.index'); 
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
        $jenis = Jenis::find($id);

        return view('jenis.edit', [
            'jenis' => $jenis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_jen' => ['required'],
            'nama_jen' => ['required']
        ]);

        $jenis = Jenis::find($id);

        $jenis->id_jen = $request->id_jen;
        $jenis->nama_jen = $request->nama_jen;

        $jenis->save();

        session()->flash('info', 'Data Berhasil Diperbarui');

        return redirect()->route('jenis.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis = Jenis::find($id);
        
        $jenis->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('jenis.index');
    }
}
