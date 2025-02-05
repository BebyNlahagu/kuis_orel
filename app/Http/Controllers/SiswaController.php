<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 2)->get();
        return view('admin.siswa.index', compact('siswa'));
    }

}
