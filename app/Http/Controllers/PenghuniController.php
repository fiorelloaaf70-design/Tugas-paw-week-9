<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    // Menampilkan daftar seluruh penghuni
    public function index()
    {
        $penghuni = Penghuni::all();
        return view('penghuni.index', compact('penghuni'));
    }

    // Menampilkan form tambah penghuni baru
    public function create()
    {
        return view('penghuni.create');
    }

    // Menyimpan data penghuni baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'identitas' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'required',
        ]);

        Penghuni::create($request->all());

        return redirect()->route('penghuni.index')
                         ->with('success', 'Data penghuni berhasil ditambahkan!');
    }

    public function show(Penghuni $penghuni)
    {
        return view('penghuni.show', compact('penghuni'));
    }

    // Menampilkan form edit data penghuni
    public function edit(Penghuni $penghuni)
    {
        return view('penghuni.edit', compact('penghuni'));
    }

    // Memperbarui data penghuni di database
    public function update(Request $request, Penghuni $penghuni)
    {
        $request->validate([
            'nama' => 'required',
            'identitas' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'required',
        ]);

        $penghuni->update($request->all());

        return redirect()->route('penghuni.index')
                         ->with('success', 'Data penghuni berhasil diperbarui!');
    }

    // Menghapus data penghuni
    public function destroy(Penghuni $penghuni)
    {
        $penghuni->delete();

        return redirect()->route('penghuni.index')
                         ->with('success', 'Data penghuni berhasil dihapus!');
    }
}