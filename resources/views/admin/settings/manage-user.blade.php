@section('title')
    <title>Admin</title>
@stop

@extends('layouts.admin')

@section('content')
    <div class="container pt-5">
        <table class="table">
            <thead>
            <tr>
                <td>SN:</td>
                <td>Name:</td>
                <td>Phone Number:</td>
                <td>email:</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @php($i= 0)
            @foreach($user as $user)
                <tr>
                    <td> {{++$i}}</td>
                    <td> {{$user->name}}</td>
                    <td> {{$user->phone_number}}</td>
                    <td> {{$user->email}}</td>
                    <td>
                        <div class="float-midt d-flex">
                           <a href="{{route('users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm edit mr-2" title="Edit">
                            <i class="fas fa-eye-dropper" title="Edit"></i>
                           </a>

                           <form action="{{route('users.destroy', $user->id ) }}" method="POST">
                                 @csrf
                                  @method('DELETE')
                                  <button onclick="return confirm('Are you sure you want to delete this item?');"
                                        class="btn btn-outline-danger btn-sm" type="submit" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                  </button>
                           </form>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@stop
