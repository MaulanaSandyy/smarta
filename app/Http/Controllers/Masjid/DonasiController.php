<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonasiController extends Controller
{
    public function index()
    {
        $donasi = Donasi::latest()->paginate(10);
        return view('masjid.donasi.index', compact('donasi'));
    }

    public function create()
    {
        return view('masjid.donasi.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'donatur' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'jenis' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['donatur', 'tanggal', 'jenis', 'jumlah', 'status', 'keterangan']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('bukti')) {
            $data['bukti'] = $request->file('bukti')->store('donasi', 'public');
        }

        Donasi::create($data);

        return redirect()->route('masjid.donasi.index')->with('success', 'Data donasi berhasil ditambahkan.');
    }

    public function show(Donasi $donasi)
    {
        return view('masjid.donasi.show', compact('donasi'));
    }

    public function edit(Donasi $donasi)
    {
        return view('masjid.donasi.edit', compact('donasi'));
    }

    public function update(Request $request, Donasi $donasi)
    {
        request()->validate([
            'donatur' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'jenis' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['donatur', 'tanggal', 'jenis', 'jumlah', 'status', 'keterangan']);

        if ($request->hasFile('bukti')) {
            $data['bukti'] = $request->file('bukti')->store('donasi', 'public');
        }

        $donasi->update($data);

        return redirect()->route('masjid.donasi.index')->with('success', 'Data donasi berhasil diperbarui.');
    }

    public function destroy(Donasi $donasi)
    {
        $donasi->delete();

        return redirect()->route('masjid.donasi.index')->with('success', 'Data donasi berhasil dihapus.');
    }
}
