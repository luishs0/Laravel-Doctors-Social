<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function show(User $profile)
    {
        return view('Admin.profiles.show', compact('profile'));
    }

    public function edit(User $profile)
    {
        $user = User::with('user_detail', 'specializations')->where('id', auth()->user()->id)->get();
        $specializations = Specialization::all();
        return view('Admin.profiles.edit', compact('profile', 'specializations'));
    }

    public function update(Request $request, User $profile)
    {

        if (!$request->specializations) {
            return redirect()->route('admin.profiles.edit', $profile->id)->with('message', 'you must choose at leats one specialization');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required'],
            'phone' => ['nullable'],
            'curriculum' => ['nullable'],
            'photo' => ['nullable'],
            'performance' => ['nullable'],
            'description' => ['nullable'],
            'specializations' => ['required', 'min:1']
        ]);

        $data['slug'] = Str::slug($data['name'] . $data['surname'] . Auth::user()->id);
        $profile->update($data);

        //controll ii on request has any file to upload
        if ($request->hasFile('photo')) {
            if ($profile->user_detail->photo) {
                Storage::delete($profile->user_detail->photo);
            }
            $img_path = Storage::put('images', $data['photo']);
            $data['photo'] = $img_path;

            $profile->user_detail()->update(['photo' => $data['photo']]);
        };

        if ($request->hasFile('curriculum')) {
            if ($profile->user_detail->curriculum) {
                Storage::delete($profile->user_detail->curriculum);
            }
            $cv_path = Storage::put('Curriculum', $data['curriculum']);
            $data['curriculum'] = $cv_path;

            $profile->user_detail()->update(['curriculum' => $data['curriculum']]);
        };

        $profile->user_detail()->update([
            'phone' => $data['phone'],
            'performance' => $data['performance'],
            'address' => $data['address'],
            'description' => $data['description'],
        ]);

        if ($request->has('specializations')) {
            $profile->specializations()->sync($request->specializations);
        } else {
            $profile->specializations()->detach();
        }

        return redirect()->route('admin.profiles.show', $profile->id)->with('message', 'profile updated!');
    }
}
