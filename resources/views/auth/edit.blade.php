
@extends('layouts.admin')

@section('content')
    <div class="container pt-5">
        {{-- <div class="">
            @if(count($errors->getBags()))
            @endif
            @if(Session::has('success'))
                <div class="alert-success"> {{Session::get('success')}}</div>
            @endif
        </div> --}}
        @if(count($errors) > 0)
                <div class="p-1">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning alert-danger fade show" role="alert">{{$error}}
                            <button type="button" class="close"
                                    data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif

        <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center mt-3">
                        <img src="{{ isset($user->profile_photo) ? asset('storage/user_image/'. $user->profile_photo) : "http://ssl.gstatic.com/accounts/ui/avatar_2x.png" }}"
                             class="avatar img-circle img-thumbnail"
                             alt="avatar">
                        <h6>Upload a different photo...</h6>
                        <input type="file" name="profile_photo" class="text-center center-block file-upload"> 
                        {{-- <link rel="shortcut icon" href="{{ isset($user->profile_photo) ? asset('storage/user_image/'. $user->profile_photo) : "http://ssl.gstatic.com/accounts/ui/avatar_2x.png" }}"type="image/x-icon" style="height: 50px;"> --}}
                        <img id="showImagePreview" src="#" alt="profile_photo preview" height="150px" width="250px" style="display: none;">
               
                    </div>
                    <hr>
                    <br>

                </div><!--/col-3-->
                <div class="col-sm-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Full name:</h4></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="full name" title="enter your first name if any." value={{$user->name}}>
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone"><h4>Phone Number:</h4></label>
                                    <input type="number" class="form-control" name="phone_number" id="phone_number"
                                           placeholder="enter phone" title="enter your phone number if any." value={{$user->phone_number}}>
                                    @if($errors->has('phone_number'))
                                        <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="you@email.com" title="enter your email." value={{$user->email}}>
                                    @if($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="email"><h4>Change Password</h4></label>
                                <input type="password" class="form-control" name="password" id="email"
                                       placeholder="enter new  password" title="enter password."  >
                                @if($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-primary" type="submit"><i
                                                class="glyphicon glyphicon-ok-sign"></i> Update
                                    </button>
                                </div>
                            </div>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
      $(document).ready(function () {
        var readURL = function (input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $('.avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }

        $(".file-upload").on('change', function () {
          readURL(this);
        });
      });
    </script>
@endsection