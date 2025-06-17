<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $poli = [
            [
                "nama_poli"=> "Penyakit Dalam",
                'deskripsi' => "Poli yang menangani penyakit dalam seperti diabetes, hipertensi, dan penyakit jantung."
            ],
            [
                "nama_poli"=> "Anak",
                'deskripsi' => "Poli yang khusus menangani kesehatan anak-anak dari bayi hingga remaja."
            ],
            [
                "nama_poli"=> "Kebidanan dan Kandungan",
                'deskripsi' => "Poli yang menangani masalah kebidanan, kandungan, dan kesehatan reproduksi wanita."
            ],
            [
                "nama_poli"=> "Mata",
                'deskripsi' => "Poli yang menangani masalah kesehatan mata seperti katarak, glaukoma, dan infeksi mata."
            ],
            [
                "nama_poli"=> "Telinga, Hidung, Tenggorokan (THT)",
                'deskripsi' => "Poli yang menangani masalah kesehatan telinga, hidung, dan tenggorokan."
            ],
            [
                "nama_poli"=> "Bedah Umum",
                'deskripsi' => "Poli yang menangani berbagai jenis operasi bedah umum."
            ],
            [
                "nama_poli"=> "Psikiatri",
                'deskripsi' => "Poli yang menangani masalah kesehatan mental dan emosional."
            ],
            [
                "nama_poli"=> "Gigi",
                'deskripsi' => "Poli yang menangani masalah kesehatan gigi dan mulut."
            ],
            [
                "nama_poli"=> "Rehabilitasi Medik",
                'deskripsi' => "Poli yang menangani rehabilitasi fisik dan pemulihan pasca cedera atau operasi."
            ],
            [
                "nama_poli"=> "Kardiologi",
                'deskripsi' => "Poli yang menangani masalah kesehatan jantung dan pembuluh darah."
            ],
            [
                "nama_poli"=> "Neurologi",
                'deskripsi' => "Poli yang menangani masalah kesehatan sistem saraf dan otak."
            ],
            [
                "nama_poli"=> "Dermatologi",
                'deskripsi' => "Poli yang menangani masalah kesehatan kulit, rambut, dan kuku."
            ],
        ];

        foreach ($poli as $key => $value) {
            Poli::create([
                'nama_poli' => $value['nama_poli'],
                'deskripsi' => $value['deskripsi'],
            ]);
        }
    }
}
