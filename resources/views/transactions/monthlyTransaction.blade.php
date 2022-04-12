@section('title')
    <title>Medicine</title>
@stop

@extends('layouts.admin')

@section('content')
    <div class="container pt-5 ml-5">
        <h5>Monthly Transactions</h5>
        <div class="col-md-12">
            <div class="row">
                <form action="{{route('getTransaction')}}" method="get" style="width: 100%">
                    @csrf
                    <div class="form-group row">                      
                        <label for="Monthlytransaction" class="col-form-label col-md-3">Months</label>
                        <select class="form-control col-md-6" id="select_medicine" name="month" >
                            <option value="" disabled selected hidden>Choose Month</option>
                            <option value="1">Janauary</option>
                            <option value="2">Febuary</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">Agust</option>
                            <option value="9">September</option>
                            <option value="10">Octobar</option>
                            <option value="11">November</option>
                            <option value="12">December</option>      
                        </select>
                    
                        {{-- @if($errors->has('expiry_date'))
                            <p class="text-danger">{{ $errors->first('expiry_date') }}</p>
                        @endif --}}
                        <button class="btn btn-success col-md-1 ml-2" type="submit">submit</button>
                      
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            @include('transactions/viewtransaction')
        </div>
    </div>
@endsection
