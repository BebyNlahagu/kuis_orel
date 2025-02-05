<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.profile',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'img' => 'nullable',
        ]);

        $user = Auth::user();
        $imagePath = $user->img;

        if ($request->hasFile('img')) {
            if ($user->img && Storage::exists('public/images/' . $user->img)) {
                Storage::delete('public/images/' . $user->img);
            }
            $imagePath = $request->file('img')->store('images', 'public');
            Log::info('Image uploaded path: ' . $imagePath);
        }

        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'img' => $imagePath,
        ]);
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
