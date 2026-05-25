<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class JamaahController extends Controller
{
    public function index()
    {
        $jamaah = User::latest()->paginate(10);
        return view('masjid.jamaah.index', compact('jamaah'))->with('perPage', 10);
    }

    public function create()
    {
        return view('masjid.jamaah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('masjid.jamaah.index')->with('success', 'Jamaah berhasil ditambahkan.');
    }

    public function show(User $jamaah)
    {
        return view('masjid.jamaah.show', compact('jamaah'));
    }

    public function edit(User $jamaah)
    {
        return view('masjid.jamaah.edit', compact('jamaah'));
    }

    public function update(Request $request, User $jamaah)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $jamaah->id,
            'password' => 'nullable|string|min:8',
        ]);

        if ($validated['password']) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $jamaah->update($validated);

        return redirect()->route('masjid.jamaah.index')->with('success', 'Jamaah berhasil diperbarui.');
    }

    public function destroy(User $jamaah)
    {
        $jamaah->delete();
        return redirect()->route('masjid.jamaah.index')->with('success', 'Jamaah berhasil dihapus.');
    }
}
