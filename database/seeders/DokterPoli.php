<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterPoli extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokterPoli = [
            ['id_dokter' => 1, 'id_poli' => 1],
            ['id_dokter' => 2, 'id_poli' => 2],
            ['id_dokter' => 3, 'id_poli' => 3],
            ['id_dokter' => 4, 'id_poli' => 4],
            ['id_dokter' => 5, 'id_poli' => 5],
        ];

        foreach ($dokterPoli as $dp) {
            \App\Models\User::where('id', $dp['id_dokter'])
                ->update(['id_poli' => $dp['id_poli']]);
        }
    }
}
