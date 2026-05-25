<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::latest()->paginate(10);
        return view('rt.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('rt.informasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'penting' => 'boolean',
            'diterbitkan' => 'boolean',
            'tanggal_terbit' => 'nullable|date',
        ]);

        Informasi::create($validated);

        return redirect()->route('rt.informasi.index')->with('success', 'Informasi berhasil ditambahkan.');
    }

    public function show(Informasi $informasi)
    {
        return view('rt.informasi.show', compact('informasi'));
    }

    public function edit(Informasi $informasi)
    {
        return view('rt.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'penting' => 'boolean',
            'diterbitkan' => 'boolean',
            'tanggal_terbit' => 'nullable|date',
        ]);

        $informasi->update($validated);

        return redirect()->route('rt.informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    public function destroy(Informasi $informasi)
    {
        $informasi->delete();

        return redirect()->route('rt.informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
}
