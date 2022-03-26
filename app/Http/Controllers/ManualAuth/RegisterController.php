<?php

namespace App\Http\Controllers\ManualAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
     
             $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profile_photo' => ['required'],
            'phone_number' => ['required'],
        ]);

        $profile_photo = time() . '.' . $request->profile_photo->extension();
        $request->profile_photo->move(public_path('images'), $profile_photo);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->phone_number),
            'profile_photo' => $profile_photo
        ]);

        Session::flash('success', 'You have successfully created an user');
        return redirect('manage/user');
    }


    public function showUser()
    {
        return view('admin.settings.manage-user',[

            'user'=> User::where('role_id','2')->get()]);
    }
   
}
