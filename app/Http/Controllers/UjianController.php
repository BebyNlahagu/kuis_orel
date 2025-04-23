<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kuis = Kuis::all();
        $jawaban = Jawaban::where('user_id',$user->id)->get();

        $total = $jawaban->sum('skor');

        $hasil = $total;
        return view('user.kuis.index', compact('kuis','jawaban','hasil'));
    }
}
