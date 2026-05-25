<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $warga = Warga::latest()->paginate(10);
        return view('rt.data-warga.index', compact('warga'));
    }

    public function create()
    {
        return view('rt.data-warga.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nik' => 'required|string|size:16|unique:wargas,nik',
            'kk' => 'required|string|size:16',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:100',
            'status_warga' => 'required|string|max:50',
            'status_keluarga' => 'required|string|max:50',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'aktif' => 'boolean',
        ]);

        Warga::create($validated);

        return redirect()->route('rt.data-warga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function show(Warga $warga)
    {
        return view('rt.data-warga.show', compact('warga'));
    }

    public function edit(Warga $warga)
    {
        return view('rt.data-warga.edit', compact('warga'));
    }

    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nik' => 'required|string|size:16|unique:wargas,nik,' . $warga->id,
            'kk' => 'required|string|size:16',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:100',
            'status_warga' => 'required|string|max:50',
            'status_keluarga' => 'required|string|max:50',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'aktif' => 'boolean',
        ]);

        $warga->update($validated);

        return redirect()->route('rt.data-warga.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()->route('rt.data-warga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}
