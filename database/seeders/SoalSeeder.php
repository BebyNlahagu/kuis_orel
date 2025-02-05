<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $soalPythagoras = [
            [
                'pertanyaan' => 'Sebuah segitiga memiliki sisi 3 cm dan 4 cm. Berapakah panjang sisi miringnya?',
                'pilihan_a' => '5 cm',
                'pilihan_b' => '6 cm',
                'pilihan_c' => '7 cm',
                'pilihan_d' => '8 cm',
                'jawaban_benar' => 'a',
            ],
            [
                'pertanyaan' => 'Jika sisi-sisi segitiga adalah 6 cm dan 8 cm, berapakah sisi miringnya?',
                'pilihan_a' => '9 cm',
                'pilihan_b' => '10 cm',
                'pilihan_c' => '12 cm',
                'pilihan_d' => '14 cm',
                'jawaban_benar' => 'b',
            ],
            [
                'pertanyaan' => 'Segitiga memiliki sisi 5 cm dan 12 cm. Berapa panjang sisi miringnya?',
                'pilihan_a' => '12 cm',
                'pilihan_b' => '13 cm',
                'pilihan_c' => '14 cm',
                'pilihan_d' => '15 cm',
                'jawaban_benar' => 'b',
            ],
            [
                'pertanyaan' => 'Segitiga dengan sisi 7 cm dan 24 cm. Berapa panjang sisi miringnya?',
                'pilihan_a' => '24 cm',
                'pilihan_b' => '25 cm',
                'pilihan_c' => '26 cm',
                'pilihan_d' => '27 cm',
                'jawaban_benar' => 'b',
            ],
            [
                'pertanyaan' => 'Segitiga dengan sisi 8 cm dan 15 cm. Berapa panjang sisi miringnya?',
                'pilihan_a' => '16 cm',
                'pilihan_b' => '17 cm',
                'pilihan_c' => '18 cm',
                'pilihan_d' => '19 cm',
                'jawaban_benar' => 'b',
            ],
            [
                'pertanyaan' => 'Segitiga dengan sisi 9 cm dan 12 cm. Berapa panjang sisi miringnya?',
                'pilihan_a' => '14 cm',
                'pilihan_b' => '15 cm',
                'pilihan_c' => '16 cm',
                'pilihan_d' => '17 cm',
                'jawaban_benar' => 'b',
            ],
            [
                'pertanyaan' => 'Segitiga dengan sisi 10 cm dan 24 cm. Berapa panjang sisi miringnya?',
                'pilihan_a' => '25 cm',
                'pilihan_b' => '26 cm',
                'pilihan_c' => '27 cm',
                'pilihan_d' => '28 cm',
                'jawaban_benar' => 'b',
            ],
            [
                'pertanyaan' => 'Segitiga dengan sisi 15 cm dan 20 cm. Berapa panjang sisi miringnya?',
                'pilihan_a' => '24 cm',
                'pilihan_b' => '25 cm',
                'pilihan_c' => '26 cm',
                'pilihan_d' => '27 cm',
                'jawaban_benar' => 'b',
            ],
            [
                'pertanyaan' => 'Segitiga dengan sisi 7 cm dan 9 cm. Berapa panjang sisi miringnya?',
                'pilihan_a' => '10 cm',
                'pilihan_b' => '11 cm',
                'pilihan_c' => '12 cm',
                'pilihan_d' => '13 cm',
                'jawaban_benar' => 'b',
            ],
            [
                'pertanyaan' => 'Segitiga dengan sisi 11 cm dan 60 cm. Berapa panjang sisi miringnya?',
                'pilihan_a' => '61 cm',
                'pilihan_b' => '62 cm',
                'pilihan_c' => '63 cm',
                'pilihan_d' => '64 cm',
                'jawaban_benar' => 'a',
            ],
        ];

        foreach ($soalPythagoras as $soal) {
            DB::table('soals')->insert([
                'kuis_id' => 1,
                'pertanyaan' => $soal['pertanyaan'],
                'pilihan_a' => $soal['pilihan_a'],
                'pilihan_b' => $soal['pilihan_b'],
                'pilihan_c' => $soal['pilihan_c'],
                'pilihan_d' => $soal['pilihan_d'],
                'jawaban_benar' => $soal['jawaban_benar'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
