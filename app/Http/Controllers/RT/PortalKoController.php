<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\PortalKo;
use Illuminate\Http\Request;

class PortalKoController extends Controller
{
    public function index()
    {
        $portalKos = PortalKo::latest()->paginate(10);
        return view('rt.portal-kos.index', compact('portalKos'));
    }

    public function create()
    {
        return view('rt.portal-kos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:20',
            'telepon' => 'nullable|string|max:20',
            'alamat_kos' => 'nullable|string|max:255',
            'pemilik' => 'nullable|string|max:255',
            'kontak_pemilik' => 'nullable|string|max:20',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'biaya_sewa' => 'nullable|numeric|min:0',
            'catatan' => 'nullable|string',
            'aktif' => 'nullable|boolean',
        ]);

        $validated['user_id'] = auth()->id();

        PortalKo::create($validated);

        return redirect()->route('rt.portal-kos.index')
            ->with('success', 'Data kos berhasil ditambahkan.');
    }

    public function show(PortalKo $portalKo)
    {
        return view('rt.portal-kos.show', compact('portalKo'));
    }

    public function edit(PortalKo $portalKo)
    {
        return view('rt.portal-kos.edit', compact('portalKo'));
    }

    public function update(Request $request, PortalKo $portalKo)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:20',
            'telepon' => 'nullable|string|max:20',
            'alamat_kos' => 'nullable|string|max:255',
            'pemilik' => 'nullable|string|max:255',
            'kontak_pemilik' => 'nullable|string|max:20',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'biaya_sewa' => 'nullable|numeric|min:0',
            'catatan' => 'nullable|string',
            'aktif' => 'nullable|boolean',
        ]);

        $portalKo->update($validated);

        return redirect()->route('rt.portal-kos.index')
            ->with('success', 'Data kos berhasil diperbarui.');
    }

    public function destroy(PortalKo $portalKo)
    {
        $portalKo->delete();

        return redirect()->back()
            ->with('success', 'Data kos berhasil dihapus.');
    }
}
