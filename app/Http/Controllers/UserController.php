<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Traits\FileUploadTrait;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Cloner\Data;

class UserController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        return view('auth.edit',[
            'user'=>User::where('id',$id)->first()
        ]);
    }

    public function update(UserRequest $request,User $user)
    {
       $user->update($request->except('_token','_method','profile_photo'));

          if ($request->hasFile('profile_photo')) {
            if (!is_null($user->profile_phot)) {

                $this->fileUpload($user, 'profile_photo', 'user_image', true);
            }
            $this->fileUpload($user, 'profile_photo', 'user_image', false);
        }
        return redirect('manage/user');
    }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
