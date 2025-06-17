<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DetailPeriksa;
use App\Models\JadwalPeriksa;
use App\Models\JanjiPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Http\Request;

class MemeriksaController extends Controller
{
    public function index(){
        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', auth()->user()->id)
            ->where('status', true)
            ->get();

        $janjiPeriksa = JanjiPeriksa::where('id_jadwal_periksa', $jadwalPeriksa->pluck('id'))
            ->get();

        return view('dokter.memeriksa.index', )->with([
            'janjiPeriksas' => $janjiPeriksa,
        ]);
    }

    public function periksa($id) 
    {
        $janjiPeriksa = JanjiPeriksa::findOrFail($id);
        $obats = Obat::all();
        return view('dokter.memeriksa.periksa')->with([
            'janjiPeriksa' => $janjiPeriksa,
            'obats'=> $obats
        ]);
    }

    public function store(Request $request, $id)
    {
        request()->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'biaya_periksa' => 'required|numeric|min:0',
            'obat' => 'array',
            'obat.*' => 'exists:obats,id',
        ]);

        $janjiPeriksa = JanjiPeriksa::findOrFail($id);

        $periksa = Periksa::create([
            'id_janji_periksa' => $janjiPeriksa->id,
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => $request->catatan,
            'biaya_periksa' => $request->biaya_periksa,
        ]);

        foreach ($request['obat'] as $item) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $item,
            ]);
        }

        return redirect()->route('dokter.memeriksa.index')->with('success', 'Periksa berhasil disimpan.');
    }

    public function edit($id)
    {
        $janjiPeriksa = JanjiPeriksa::findOrFail($id);
        $obats = Obat::all();
        return view('dokter.memeriksa.edit')->with([
            'janjiPeriksa' => $janjiPeriksa,
            'obats' => $obats,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'biaya_periksa' => 'required|numeric|min:0',
            'obat' => 'array',
            'obat.*' => 'exists:obats,id',
        ]);
        // Update the Periksa record
        $periksa = Periksa::where('id_janji_periksa', $id)->firstOrFail();
        $periksa->update([
            'tgl_periksa' => $validatedData['tgl_periksa'],
            'catatan' => $validatedData['catatan'],
            'biaya_periksa' => $validatedData['biaya_periksa'],
        ]);

        // Delete existing DetailPeriksa records for this Periksa
        DetailPeriksa::where('id_periksa', $periksa->id)->delete();

        // Update or create DetailPeriksa records
        foreach ($validatedData['obat'] as $obatId) {
            DetailPeriksa::updateOrCreate(
                ['id_periksa' => $periksa->id, 'id_obat' => $obatId],
                ['id_periksa' => $periksa->id, 'id_obat' => $obatId]
            );
        }
        
        return redirect()->route('dokter.memeriksa.index')->with('success', 'Periksa berhasil diperbarui.');
    }
}
