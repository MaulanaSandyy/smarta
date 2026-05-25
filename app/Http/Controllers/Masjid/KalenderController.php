<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\KalenderEvent;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        $events = KalenderEvent::latest()->paginate(10);
        return view('masjid.kalender.index', compact('events'));
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

        return redirect()->route('masjid.kalender.index')->with('success', 'Acara berhasil ditambahkan.');
    }

    public function destroy(KalenderEvent $kalenderEvent)
    {
        $kalenderEvent->delete();
        return redirect()->route('masjid.kalender.index')->with('success', 'Acara berhasil dihapus.');
    }
}
