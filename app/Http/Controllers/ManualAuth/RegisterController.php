<?php

namespace App\Http\Controllers\ManualAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserRequest;
use App\Traits\FileUploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    use FileUploadTrait;
    public function register(UserRequest $request)
    {

       
        $data = $request->except('_token','_method','profile_photo');

        $data['password'] = Hash::make($data['password']);
        $data['role_id'] = 2;


        $user=User::create($data);

        //   if($request->profile_photo){
        //     $profile_photo = time() . '.' . $request->profile_photo->extension();
        //     $request->profile_photo->move(public_path('user_images'), $profile_photo);
        // }

        if ($request->hasFile('profile_photo')) {
       
            $this->fileUpload($user, 'profile_photo', 'user_image', false);
        }

        
        return redirect('manage/user');
    }


    public function showUser()
    {
        return view('admin.settings.manage-user',[

            'user'=> User::where('role_id','2')->get()]);
    }
   
}
