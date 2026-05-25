<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use App\Models\PembayaranIuran;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $pembayaran = PembayaranIuran::with(['warga', 'iuran'])->latest()->paginate($perPage);
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $iuran = $pembayaran->through(function ($item) {
            $bulanAngka = explode('-', $item->bulan)[1] ?? date('m');
            $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'][(int)$bulanAngka - 1] ?? '';
            return [
                'keluarga' => $item->warga->nama ?? 'Warga',
                'jumlah' => 'Rp ' . number_format($item->jumlah, 0, ',', '.'),
                'tgl' => $item->dikonfirmasi ? $item->tanggal_bayar->format('d/m/Y') : '-',
                'metode' => $item->dikonfirmasi ? ucfirst($item->metode) : '-',
                'status' => $item->dikonfirmasi ? 'Lunas' : 'Belum',
                'bulan' => $namaBulan,
                'tahun' => explode('-', $item->bulan)[0] ?? date('Y'),
                'ket' => $item->keterangan ?? ($item->dikonfirmasi ? 'Pembayaran iuran ' . strtolower($namaBulan) . ' ' . explode('-', $item->bulan)[0] : 'Belum melakukan pembayaran.'),
                'bulanAngka' => $bulanAngka,
                'tahunAngka' => explode('-', $item->bulan)[0] ?? date('Y'),
                'jumlah_angka' => $item->jumlah,
            ];
        });

        return view('rt.iuran.index', compact('iuran', 'perPage', 'months'));
    }

    public function create()
    {
        return view('rt.iuran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'periode' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
            'aktif' => 'boolean',
        ]);

        Iuran::create($validated);

        return redirect()->route('rt.iuran.index')->with('success', 'Iuran berhasil ditambahkan.');
    }

    public function show(Iuran $iuran)
    {
        return view('rt.iuran.show', compact('iuran'));
    }

    public function edit(Iuran $iuran)
    {
        return view('rt.iuran.edit', compact('iuran'));
    }

    public function update(Request $request, Iuran $iuran)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'periode' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
            'aktif' => 'boolean',
        ]);

        $iuran->update($validated);

        return redirect()->route('rt.iuran.index')->with('success', 'Iuran berhasil diperbarui.');
    }

    public function destroy(Iuran $iuran)
    {
        $iuran->delete();

        return redirect()->route('rt.iuran.index')->with('success', 'Iuran berhasil dihapus.');
    }

    public function bayar(Request $request)
    {
        $validated = $request->validate([
            'warga_id' => 'required|exists:warga,id',
            'iuran_id' => 'required|exists:iuran,id',
            'user_id' => 'nullable|exists:users,id',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'bulan' => 'required|string|max:20',
            'metode' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'bukti' => 'nullable|string',
            'dikonfirmasi' => 'boolean',
        ]);

        PembayaranIuran::create($validated);

        return redirect()->route('rt.iuran.index')->with('success', 'Pembayaran iuran berhasil dicatat.');
    }

    public function pembayaranIndex()
    {
        $pembayaran = PembayaranIuran::with(['warga', 'iuran'])->latest()->paginate(10);
        return view('rt.iuran.pembayaran', compact('pembayaran'));
    }
}
