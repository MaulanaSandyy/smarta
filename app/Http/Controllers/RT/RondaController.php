<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Ronda;
use App\Models\JadwalRonda;
use App\Models\LaporanKeamanan;
use App\Models\Warga;
use Illuminate\Http\Request;

class RondaController extends Controller
{
    public function index()
    {
        $ronda = Ronda::latest()->paginate(10);
        $jadwal = JadwalRonda::with(['ronda', 'warga'])->latest()->paginate(10);
        $posList = ['Pos 1', 'Pos 2', 'Pos 3', 'Pos 4'];

        return view('rt.ronda.index', compact('ronda', 'jadwal', 'posList'));
    }

    public function create()
    {
        return view('rt.ronda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'aktif' => 'nullable|boolean',
        ]);

        Ronda::create($validated);

        return redirect()->route('rt.ronda.index')
            ->with('success', 'Ronda berhasil ditambahkan.');
    }

    public function show(Ronda $ronda)
    {
        return view('rt.ronda.show', compact('ronda'));
    }

    public function edit(Ronda $ronda)
    {
        return view('rt.ronda.edit', compact('ronda'));
    }

    public function update(Request $request, Ronda $ronda)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'aktif' => 'nullable|boolean',
        ]);

        $ronda->update($validated);

        return redirect()->route('rt.ronda.index')
            ->with('success', 'Ronda berhasil diperbarui.');
    }

    public function destroy(Ronda $ronda)
    {
        $ronda->delete();

        return redirect()->back()
            ->with('success', 'Ronda berhasil dihapus.');
    }

    public function jadwalStore(Request $request)
    {
        $validated = $request->validate([
            'ronda_id' => 'required|exists:rondas,id',
            'warga_id' => 'required|exists:wargas,id',
            'hari' => 'required|string|max:50',
            'waktu' => 'nullable',
            'pos' => 'required|string|max:50',
            'tanggal' => 'required|date',
            'hadir' => 'nullable|boolean',
        ]);

        JadwalRonda::create($validated);

        return redirect()->route('rt.ronda.index')
            ->with('success', 'Jadwal ronda berhasil ditambahkan.');
    }

    public function laporanKeamananStore(Request $request)
    {
        $validated = $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'nullable|string|max:50',
            'tanggal' => 'required|date',
        ]);

        $validated['user_id'] = auth()->id();

        LaporanKeamanan::create($validated);

        return redirect()->route('rt.ronda.index')
            ->with('success', 'Laporan keamanan berhasil ditambahkan.');
    }
}
