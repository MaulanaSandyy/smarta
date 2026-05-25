<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Kas;
use App\Models\Warga;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $transaksi = Kas::with('warga')->latest()->paginate(10);
        return view('rt.kas.index', compact('transaksi'));
    }

    public function create()
    {
        $warga = Warga::where('aktif', true)->get();
        return view('rt.kas.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'warga_id' => 'nullable|exists:wargas,id',
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'kategori' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
            'bukti' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = auth()->id();

        Kas::create($validated);

        return redirect()->route('rt.kas.index')
            ->with('success', 'Kas berhasil ditambahkan.');
    }

    public function show(Kas $kas)
    {
        return view('rt.kas.show', compact('kas'));
    }

    public function edit(Kas $kas)
    {
        $warga = Warga::where('aktif', true)->get();
        return view('rt.kas.edit', compact('kas', 'warga'));
    }

    public function update(Request $request, Kas $kas)
    {
        $validated = $request->validate([
            'warga_id' => 'nullable|exists:wargas,id',
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'kategori' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
            'bukti' => 'nullable|string|max:255',
        ]);

        $kas->update($validated);

        return redirect()->route('rt.kas.index')
            ->with('success', 'Kas berhasil diperbarui.');
    }

    public function destroy(Kas $kas)
    {
        $kas->delete();

        return redirect()->back()
            ->with('success', 'Kas berhasil dihapus.');
    }
}
