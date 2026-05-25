<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $pengajuanSurat = PengajuanSurat::latest()->paginate(10);
        return view('rt.surat.index', compact('pengajuanSurat'));
    }

    public function create()
    {
        return view('rt.surat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'warga_id' => 'required|exists:warga,id',
            'jenis_surat' => 'required|string|max:255',
            'nomor_surat' => 'nullable|string|max:255',
            'keperluan' => 'required|string',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:50',
            'catatan' => 'nullable|string',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        PengajuanSurat::create($validated);

        return redirect()->route('rt.surat.index')->with('success', 'Pengajuan surat berhasil ditambahkan.');
    }

    public function show(PengajuanSurat $pengajuanSurat)
    {
        return view('rt.surat.show', compact('pengajuanSurat'));
    }

    public function edit(PengajuanSurat $pengajuanSurat)
    {
        return view('rt.surat.edit', compact('pengajuanSurat'));
    }

    public function update(Request $request, PengajuanSurat $pengajuanSurat)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'warga_id' => 'required|exists:warga,id',
            'jenis_surat' => 'required|string|max:255',
            'nomor_surat' => 'nullable|string|max:255',
            'keperluan' => 'required|string',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:50',
            'catatan' => 'nullable|string',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $pengajuanSurat->update($validated);

        return redirect()->route('rt.surat.index')->with('success', 'Pengajuan surat berhasil diperbarui.');
    }

    public function destroy(PengajuanSurat $pengajuanSurat)
    {
        $pengajuanSurat->delete();

        return redirect()->route('rt.surat.index')->with('success', 'Pengajuan surat berhasil dihapus.');
    }
}
