@section('title')
    <title>Medicine</title>
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
    
        <form action="{{route('medicines.update',$medicine->id)}}" method="post">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-sm-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="medicine-name" class="col-form-label">medicine
                                        Name:</label>
                                    <input type="text" class="form-control" name="medicine_name" required id="name" value={{$medicine->medicine_name}}>
                                    @if($errors->has('medicine_name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="phone"><h4>Selling Price:</h4></label>
                                    <input type="number" class="form-control" name="selling_price" required id="selling_price" value={{$medicine->selling_price}}
                                           placeholder="Selling Price">
                                 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="dosage"><h4>Quantity:</h4></label>
                                    <input type="number" class="form-control" name="total_quantity" required id="quantity"
                                           placeholder="Quantity" value={{$medicine->total_quantity}}>
                                    @if($errors->has('quantity'))
                                        <p class="text-danger">{{ $errors->first('quantity') }}</p>
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
