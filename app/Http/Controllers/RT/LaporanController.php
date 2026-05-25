<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::latest()->paginate(10);
        return view('rt.laporan.index', compact('laporan'));
    }

    public function create()
    {
        return view('rt.laporan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'warga_id' => 'required|exists:warga,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'status' => 'required|string|max:50',
            'tanggapan' => 'nullable|string',
            'tanggal_laporan' => 'required|date',
            'tanggal_ditanggapi' => 'nullable|date',
        ]);

        Laporan::create($validated);

        return redirect()->route('rt.laporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function show(Laporan $laporan)
    {
        return view('rt.laporan.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        return view('rt.laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'warga_id' => 'required|exists:warga,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'status' => 'required|string|max:50',
            'tanggapan' => 'nullable|string',
            'tanggal_laporan' => 'required|date',
            'tanggal_ditanggapi' => 'nullable|date',
        ]);

        $laporan->update($validated);

        return redirect()->route('rt.laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('rt.laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }

    public function tanggap(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'tanggapan' => 'required|string',
            'status' => 'required|string|max:50',
        ]);

        $laporan->update([
            'tanggapan' => $validated['tanggapan'],
            'status' => $validated['status'],
            'tanggal_ditanggapi' => now(),
        ]);

        return redirect()->route('rt.laporan.index')->with('success', 'Tanggapan laporan berhasil dikirim.');
    }
}
