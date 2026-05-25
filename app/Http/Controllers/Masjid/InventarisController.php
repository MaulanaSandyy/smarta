<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\InventarisMasjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = InventarisMasjid::latest()->paginate(10);
        return view('masjid.inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('masjid.inventaris.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'nilai' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'kategori', 'jumlah', 'kondisi', 'lokasi', 'nilai', 'keterangan']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('inventaris', 'public');
        }

        InventarisMasjid::create($data);

        return redirect()->route('masjid.inventaris.index')->with('success', 'Data inventaris berhasil ditambahkan.');
    }

    public function show(InventarisMasjid $inventarisMasjid)
    {
        return view('masjid.inventaris.show', compact('inventarisMasjid'));
    }

    public function edit(InventarisMasjid $inventarisMasjid)
    {
        return view('masjid.inventaris.edit', compact('inventarisMasjid'));
    }

    public function update(Request $request, InventarisMasjid $inventarisMasjid)
    {
        request()->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'nilai' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'kategori', 'jumlah', 'kondisi', 'lokasi', 'nilai', 'keterangan']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('inventaris', 'public');
        }

        $inventarisMasjid->update($data);

        return redirect()->route('masjid.inventaris.index')->with('success', 'Data inventaris berhasil diperbarui.');
    }

    public function destroy(InventarisMasjid $inventarisMasjid)
    {
        $inventarisMasjid->delete();

        return redirect()->route('masjid.inventaris.index')->with('success', 'Data inventaris berhasil dihapus.');
    }
}
