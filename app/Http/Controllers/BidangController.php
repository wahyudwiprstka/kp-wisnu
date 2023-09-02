<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bidang = Bidang::paginate(10);
        if ($request->search != null) {
            $bidang = Bidang::where('nama_bidang', 'LIKE', '%' . $request->search . '%')->orWhere('kepala_bidang', 'LIKE', '%' . $request->search . '%')->paginate(10);
        }
        return view('bidang.bidang', [
            'bidang' => $bidang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bidang.tambah-bidang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bidang' => 'required',
            'kepala_bidang' => 'required',
            'jumlah_pegawai' => 'required',
            'no_telp' => 'required|max:15',
        ]);
        Bidang::create($validated);
        return redirect('/bidang')->with('success', 'Keluhan berhasil ditambahkan');
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
