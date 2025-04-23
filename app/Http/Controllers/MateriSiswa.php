<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriSiswa extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        return view('user.materi.index',compact('materi'));
    }
}
