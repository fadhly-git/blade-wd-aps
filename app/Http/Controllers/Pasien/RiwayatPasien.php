<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\DetailPeriksa;
use App\Models\JadwalPeriksa;
use App\Models\JanjiPeriksa;
use App\Models\Periksa;
use Illuminate\Http\Request;

class RiwayatPasien extends Controller
{
    public function index()
    {
        $janjiPeriksa = JanjiPeriksa::where('id_pasien', auth()->user()->id)
            ->with(['jadwal_periksa.dokter.poli', 'periksa']) // pastikan relasi ini tersedia di model
            ->get();
        return view('pasien.riwayat.index', [
            'janjiPeriksa' => $janjiPeriksa,
        ]);
    }

    public function show($id)
    {
        $periksa = Periksa::where('id_janji_periksa', $id)
            ->with(['detail_periksa', 'detail_periksa.obat'])
            ->first();

        $data = [
            'tgl_periksa' => $periksa->tgl_periksa->format('d-m-Y H:i'),
            'catatan' => $periksa->catatan,
            'biaya_periksa' => $periksa->biaya_periksa,
            'obat' => $periksa->detail_periksa->map(function ($detail) {
                return [
                    'nama_obat' => $detail->obat->nama_obat,
                    'kemasan' => $detail->obat->kemasan,
                ];
            }),
        ];

        return view('pasien.riwayat.show', [
            'janjiPeriksa' => $data,
        ]);
    }

    public function detail($id)
    {
        $janjiPeriksa = JanjiPeriksa::with(['jadwal_periksa.dokter.poli', 'periksa'])
            ->findOrFail($id);

        return view('pasien.riwayat.detail', [
            'janjiPeriksa' => $janjiPeriksa,
        ]);
    }

    public function show_Json()
    {
        $id = 1;
        $periksa = Periksa::where('id_janji_periksa', $id)
            ->with(['detail_periksa', 'detail_periksa.obat'])
            ->first();

        $data = [
            'tgl_periksa' => $periksa->tgl_periksa->format('d-m-Y H:i'),
            'catatan' => $periksa->catatan,
            'biaya_periksa' => $periksa->biaya_periksa,
            'obat' => $periksa->detail_periksa->map(function ($detail) {
                return [
                    'nama_obat' => $detail->obat->nama_obat,
                    'kemasan' => $detail->obat->kemasan,
                ];
            }),
        ];
        return response()->json([
            'janjiPeriksa' => $data,
        ]);
    }
}
