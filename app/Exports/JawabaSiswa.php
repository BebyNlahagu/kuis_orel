<?php

namespace App\Exports;

use App\Models\Jawaban;
use Maatwebsite\Excel\Concerns\FromCollection;

class JawabaSiswa implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jawaban::with('soal','user')->get();
    }
}
