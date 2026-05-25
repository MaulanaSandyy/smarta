<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\Kajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KajianController extends Controller
{
    public function index()
    {
        $kajian = Kajian::latest()->paginate(10);
        return view('masjid.kajian.index', compact('kajian'));
    }

    public function create()
    {
        return view('masjid.kajian.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'judul' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'waktu' => 'required|date_format:H:i',
            'pemateri' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'aktif' => 'nullable|boolean',
        ]);

        $data = $request->only(['judul', 'hari', 'waktu', 'pemateri', 'tempat', 'kategori', 'deskripsi', 'aktif']);
        $data['user_id'] = Auth::id();
        $data['aktif'] = $request->boolean('aktif');

        Kajian::create($data);

        return redirect()->route('masjid.kajian.index')->with('success', 'Data kajian berhasil ditambahkan.');
    }

    public function show(Kajian $kajian)
    {
        return view('masjid.kajian.show', compact('kajian'));
    }

    public function edit(Kajian $kajian)
    {
        return view('masjid.kajian.edit', compact('kajian'));
    }

    public function update(Request $request, Kajian $kajian)
    {
        request()->validate([
            'judul' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'waktu' => 'required|date_format:H:i',
            'pemateri' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'aktif' => 'nullable|boolean',
        ]);

        $data = $request->only(['judul', 'hari', 'waktu', 'pemateri', 'tempat', 'kategori', 'deskripsi', 'aktif']);
        $data['aktif'] = $request->boolean('aktif');

        $kajian->update($data);

        return redirect()->route('masjid.kajian.index')->with('success', 'Data kajian berhasil diperbarui.');
    }

    public function destroy(Kajian $kajian)
    {
        $kajian->delete();

        return redirect()->route('masjid.kajian.index')->with('success', 'Data kajian berhasil dihapus.');
    }
}
