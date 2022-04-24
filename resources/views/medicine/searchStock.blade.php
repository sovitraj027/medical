@section('title')
    <title>Medicine</title>
@stop

@extends('layouts.admin')

@section('content')
    <div class="container pt-5 ml-5">
        <h5>Expire Medicines</h5>
        <div class="col-md-12">
            <div class="row">
                <form action="{{route('search-stock')}}" method="get" style="width: 100%">
                    @csrf
                    <div class="form-group row">                      
                        <label for="Medicine" class="col-form-label col-md-3">Expiry Date:</label>
                        
                        <input type="date" class="form-control col-md-6" name="expiry_date" id="expiry_date"
                        value="{{Request::get('name')}}"  required placeholder="enter expiry date">
                        @if($errors->has('expiry_date'))
                            <p class="text-danger">{{ $errors->first('expiry_date') }}</p>
                        @endif
                        <button class="btn btn-success col-md-1 ml-2" type="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            @include('medicine/viewStockPartial')
        </div>
    </div>
@endsection
