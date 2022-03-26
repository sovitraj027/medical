@section('title')
    <title>Manufacturer</title>
@stop

@extends('layouts.admin')


@section('content')
    <div class="container pt-5">
       
        <div class="">
            @if(count($errors->getBags()))
            @endif
            @if(Session::has('success'))
                <div class="alert-success"> {{Session::get('success')}}</div>
            @endif
        </div>
     
        <form action="{{route('manufacture.update',$manufacturer->id)}}" method="post">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-sm-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="medicine-name" class="col-form-label">Manufacturer
                                        Name:</label>
                                    <input type="text" class="form-control" name="manufacturer_name" id="name" value={{$manufacturer->manufacturer_name}}>
                                    @if($errors->has('medicine_name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-lg btn-primary" type="submit"><i
                                                class="glyphicon glyphicon-ok-sign"></i> update
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
@stop
