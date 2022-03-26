@section('content')
    <div class="container pt-5 col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>SN:</th>
                <th>Manufacturer Name:</th>
                <th>Created At:</th>
                <th>Actions</th>
        
            </tr>
            </thead>
            <tbody>
            @if($manufacturer)
                @php($sn = 0)
                @foreach($manufacturer as $manufacturer)
                    <tr>
                        <td>{{++$sn}}</td>
                        <td>{{$manufacturer->manufacturer_name}}</td>
                        <td>{{$manufacturer->created_at}}</td>
                        <td>
                            <div class="float-mid d-flex">
                                <a href="{{route('manufacture.edit',$manufacturer->id)}}" class="btn btn-outline-primary btn-sm edit mr-2" title="Edit">
                                 <i class="fas fa-eye-dropper" title="Edit"></i>
                                </a>
        
                                <form action="{{route('manufacture.destroy',$manufacturer->id)}}" method="POST">
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
            @else
                <h3>No any medicine yet</h3>
            @endif
            </tbody>
        </table>
    </div>
@stop