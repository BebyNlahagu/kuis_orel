<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use Illuminate\Support\Facades\DB;

class RangkingController extends Controller
{
    public function index()
    {
        $siswa = Jawaban::select('user_id',DB::raw('SUM(skor) as total_skor'))->groupBy('user_id')->orderByDesc('total_skor')->get();
        
        return view('admin.rangking',compact('siswa'));
    }
}
