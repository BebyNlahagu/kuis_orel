<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kuis;
use Illuminate\Http\Request;

class KuisController extends Controller
{
    public function index()
    {
        $kuis = Kuis::all();

        return view('admin.kuis.index',compact('kuis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kuis' => 'required',
        ]);

        Kuis::create([
            'jenis_kuis' => $request->jenis_kuis,
        ]);

        return redirect()->route('kuis.index')->with('success','Data Berhasil Di tambahkan');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kuis' => 'required',
        ]);

        $kuis = Kuis::findOrFail($id);

        $kuis->update([
            'jenis_kuis' => $request->jenis_kuis,
        ]);

        return redirect()->route('kuis.index')->with('success','Data Berhasil Di tambahkan');
    }

    public function edit($id)
    {
        $kuis = Kuis::findOrFail($id)->get();

        return redirect()->route('kuis.index',compact('kuis'));
    }
}
