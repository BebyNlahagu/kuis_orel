<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        return view('admin.materi.index', compact('materi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mapel' => 'required|string',
            'kelas' => 'required|string',
            'video' => 'required|file|mimes:mp4,mkv,avi|max:20480' // 20MB max
        ]);

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $path = $video->storeAs('public/videos', $videoName);
        } else {
            return back()->with("Video Tidak Terupload !!");
        }
        Materi::create([
            'mapel' => $request->mapel,
            'kelas' => $request->kelas,
            'video' => $videoName,
        ]);

        Alert::success('Berhasil', 'Berhasil Menambahkan Data Pada Materi');
        return redirect()->route('materi.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mapel' => 'required|string',
            'kelas' => 'required|string',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:50000'
        ]);

        $materi = Materi::findOrFail($id);

        if ($request->hasFile('video')) {
            if ($materi->video) {
                Storage::delete('public/videos/' . $materi->video);
            }

            $video = $request->file('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->storeAs('public/videos', $videoName);

            $materi->video = $videoName;
        }

        $materi->mapel = $request->mapel;
        $materi->kelas = $request->kelas;
        $materi->save();

        Alert::success('Berhasil', 'Data Materi Berhasil Diperbarui');
        return redirect()->route('materi.index');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id)->get();
        return redirect()->route('materi.index',compact('materi'));
    }

    public function destroy($id)
    {
        Materi::findOrFail($id)->delete();
        return redirect()->route('materi.index');
    }
}
