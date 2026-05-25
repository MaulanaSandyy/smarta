<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::latest()->paginate(10);
        return view('rt.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('rt.agenda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable',
            'tempat' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'status' => 'nullable|string|max:50',
        ]);

        $validated['user_id'] = auth()->id();

        Agenda::create($validated);

        return redirect()->route('rt.agenda.index')
            ->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function show(Agenda $agenda)
    {
        return view('rt.agenda.show', compact('agenda'));
    }

    public function edit(Agenda $agenda)
    {
        return view('rt.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'nullable',
            'tempat' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'status' => 'nullable|string|max:50',
        ]);

        $agenda->update($validated);

        return redirect()->route('rt.agenda.index')
            ->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->back()
            ->with('success', 'Agenda berhasil dihapus.');
    }
}
