<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\KalenderEvent;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        $kalenderEvents = KalenderEvent::latest()->paginate(10);
        return view('rt.kalender.index', compact('kalenderEvents'));
    }

    public function create()
    {
        return view('rt.kalender.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'warna' => 'nullable|string|max:20',
        ]);

        $validated['user_id'] = auth()->id();

        KalenderEvent::create($validated);

        return redirect()->route('rt.kalender.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function show(KalenderEvent $kalenderEvent)
    {
        return view('rt.kalender.show', compact('kalenderEvent'));
    }

    public function edit(KalenderEvent $kalenderEvent)
    {
        return view('rt.kalender.edit', compact('kalenderEvent'));
    }

    public function update(Request $request, KalenderEvent $kalenderEvent)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'warna' => 'nullable|string|max:20',
        ]);

        $kalenderEvent->update($validated);

        return redirect()->route('rt.kalender.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(KalenderEvent $kalenderEvent)
    {
        $kalenderEvent->delete();

        return redirect()->back()
            ->with('success', 'Event berhasil dihapus.');
    }
}
