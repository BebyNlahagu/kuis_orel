<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kuis;
use App\Models\Soal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 1:
                    $siswa = User::where('role',2)->count();
                    return view('admin.index',compact('siswa'));
                    break;
                case 2:
                    $jawaban = Jawaban::all();
                    $kuis = Kuis::orderBy('jenis_kuis','asc');
                    $soal = Soal::all();

                    return view('user.index',compact('soal','kuis','jawaban'));
                    break;
                default:
                    return view('welcome');
            }
        }
    }

}
