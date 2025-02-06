<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kuis;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        $kuis = Kuis::all();
        $jawaban = Jawaban::select('user_id', 'skor')->get()->groupBy('user_id');
        return view('user.kuis.index', compact('kuis','jawaban'));
    }
}
