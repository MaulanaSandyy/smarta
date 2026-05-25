<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\KeuanganMasjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    public function index()
    {
        $transaksi = KeuanganMasjid::latest()->paginate(10);
        return view('masjid.keuangan.index', compact('transaksi'));
    }

    public function create()
    {
        return view('masjid.keuangan.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['tipe', 'jumlah', 'kategori', 'keterangan', 'tanggal']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('bukti')) {
            $data['bukti'] = $request->file('bukti')->store('keuangan', 'public');
        }

        KeuanganMasjid::create($data);

        return redirect()->route('masjid.keuangan.index')->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    public function show(KeuanganMasjid $keuanganMasjid)
    {
        return view('masjid.keuangan.show', compact('keuanganMasjid'));
    }

    public function edit(KeuanganMasjid $keuanganMasjid)
    {
        return view('masjid.keuangan.edit', compact('keuanganMasjid'));
    }

    public function update(Request $request, KeuanganMasjid $keuanganMasjid)
    {
        request()->validate([
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['tipe', 'jumlah', 'kategori', 'keterangan', 'tanggal']);

        if ($request->hasFile('bukti')) {
            $data['bukti'] = $request->file('bukti')->store('keuangan', 'public');
        }

        $keuanganMasjid->update($data);

        return redirect()->route('masjid.keuangan.index')->with('success', 'Data keuangan berhasil diperbarui.');
    }

    public function destroy(KeuanganMasjid $keuanganMasjid)
    {
        $keuanganMasjid->delete();

        return redirect()->route('masjid.keuangan.index')->with('success', 'Data keuangan berhasil dihapus.');
    }
}
