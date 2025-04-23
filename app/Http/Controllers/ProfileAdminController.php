<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProfileAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('admin.profile.index',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable',
            'email' => 'nullable|email',
            'img' => 'nullable',
            'password' => 'nullable|string|min:6|confirmed',
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

        if($request->filled('password'))
        {
            $data['password'] = Hash::make($request->password);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'img' => $imagePath,
        ];
        
        DB::table('users')->where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
