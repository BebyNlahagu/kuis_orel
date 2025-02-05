<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Soal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JawabanController extends Controller


{
    public function index()
    {
        $jawaban = Jawaban::with('soal','user')->get();

        $jumlah = $jawaban->groupBy('user_id')->map(function ($items) {
            return $items->sum('skor');
        });
        return view('admin.nilai.index', compact('jawaban','jumlah'));
    }

    public function store(Request $request)
    {
        $jawabanUser = $request->input('soal');
        $userId = auth()->id();

        foreach ($jawabanUser as $soalId => $jawaban) {
            $soal = Soal::find($soalId);

            if ($soal) {
                $skor = $jawaban === $soal->jawaban_benar ? 4 : 0;

                Jawaban::create([
                    'soal_id' => $soalId,
                    'user_id' => $userId,
                    'skor'    => $skor,
                ]);
            }
        }
        Alert::success('Berhasil','Jawaban Berhasil Dikirim',$skor);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        Jawaban::findOrFail($id)->delete();
        return redirect()->route('nilai.index')->with('succes','Data Berhasil Dihapus');
    }
}
