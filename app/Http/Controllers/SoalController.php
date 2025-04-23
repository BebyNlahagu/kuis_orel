<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Soal;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SoalController extends Controller
{
    public function index(Request $request)
    {
        $jenisKuis = $request->input('jenis_kuis');
        $role = auth()->user()->role;

        if ($jenisKuis) {
            $soal = Soal::whereHas('kuis', function ($query) use ($jenisKuis) {
                $query->orderBy('id', 'desc');
            })->get();
        } else {
            $soal = Soal::with('kuis')->get();
        }

        $kuis = Kuis::all();

        if ($role == 1) {
            return view('admin.soal.index', compact('soal', 'kuis', 'jenisKuis'));
        } elseif ($role == 2) {
            return view('user.soal.index', compact('soal', 'kuis', 'jenisKuis'));
        } else {
            abort(403, 'Akses ditolak');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'kuis_id' => 'required|exists:kuis,id',
            'image' => 'required|string',
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
            'jawaban_benar' => 'required|in:a,b,c,d'
        ]);

        $image = $request->file('image');
        $image_ex = $image->getClientOriginalExtension();
        $imageNama = now()->format('YmdHis') . '.' . $image_ex;
        $image->storeAs('public/images', $imageNama);

        Soal::create([
            'kuis_id' => $request->kuis_id,
            'image' => $request->imageNama,
            'pertanyaan' => $request->pertanyaan,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'jawaban_benar' => $request->jawaban_benar,
        ]);

        Alert::success('Berhasil', 'Soal berhasil ditambahkan');
        return redirect()->route('soal.index');
    }

    public function edit($id)
    {
        $soal = soal::findOrFail($id)->get();
        $kuis = Kuis::all();

        return redirect()->route('soal.index', compact('soal', 'kuis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kuis_id' => 'nullable|exists:kuis,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pertanyaan' => 'nullable|string',
            'pilihan_a' => 'nullable|string',
            'pilihan_b' => 'nullable|string',
            'pilihan_c' => 'nullable|string',
            'pilihan_d' => 'nullable|string',
            'jawaban_benar' => 'nullable|in:a,b,c,d'
        ]);

        $soal = Soal::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($soal->image && Storage::exists('public/images/' . $soal->image)) {
                Storage::delete('public/images/' . $soal->image);
            }
            $image = $request->file('image');
            $image_ex = $image->getClientOriginalExtension();
            $imageNama = now()->format('YmdHis') . '.' . $image_ex;
            $image->storeAs('public/images', $imageNama);

            $soal->image = $imageNama;
        }

        $soal->update([
            'kuis_id' => $request->kuis_id,
            'pertanyaan' => $request->pertanyaan,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'jawaban_benar' => $request->jawaban_benar,
        ]);

        Alert::success('Berhasil', 'Soal berhasil diubah');
        return redirect()->route('soal.index')->with('success', 'Data Soal Berhasil Diperbarui');
    }


    public function destroy($id)
    {
        Soal::findOrFail($id)->delete();
        $kuis = Kuis::all();
        $soal = Soal::all();

        Alert::success('Data Berhasil Dihapus');
        return view('admin.soal.index', compact('kuis', 'soal'));
    }
}
