<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10);
        return view('masjid.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('masjid.galeri.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:foto,video,artikel',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,pdf,doc,docx|max:10240',
            'url' => 'nullable|url|max:255',
            'tanggal' => 'required|date',
            'status' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tipe', 'url', 'tanggal', 'status']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('galeri', 'public');
        }

        Galeri::create($data);

        return redirect()->route('masjid.galeri.index')->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function show(Galeri $galeri)
    {
        return view('masjid.galeri.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        return view('masjid.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        request()->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:foto,video,artikel',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,pdf,doc,docx|max:10240',
            'url' => 'nullable|url|max:255',
            'tanggal' => 'required|date',
            'status' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tipe', 'url', 'tanggal', 'status']);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('masjid.galeri.index')->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();

        return redirect()->route('masjid.galeri.index')->with('success', 'Data galeri berhasil dihapus.');
    }
}
