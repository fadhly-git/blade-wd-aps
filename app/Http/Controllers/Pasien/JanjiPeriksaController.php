<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use App\Models\JanjiPeriksa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JanjiPeriksaController extends Controller
{
    public function index()
    {
        $no_rm = Auth::user()->no_rm;
        $dokters = User::with(['jadwalPeriksas' => function($query) {
            $query->where('status', true);
        }])->where('role', 'dokter')->get();

        return view('pasien.janji-periksa.index', compact('no_rm', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:users,id',
            'keluhan' => 'required',
        ]);

        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', $request->id_dokter)
            ->where('status', true)->first();

        $jumlahJanji = JanjiPeriksa::where('id_jadwal_periksa', $jadwalPeriksa->id)->count();

        JanjiPeriksa::create([
            'id_pasien' => Auth::user()->id,
            'id_jadwal_periksa' => $jadwalPeriksa->id,
            'keluhan' => $request->keluhan,
            'no_antrian' => $jumlahJanji + 1,
        ]);

        return redirect()->route('pasien.janji-periksa.index')
            ->with('status', 'janji-periksa-created');
    }
}