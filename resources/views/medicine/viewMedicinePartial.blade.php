<table class="table">
    <thead>
    <tr>
        <th>SN:</th>
        <th>Medicine</th>
        <th>Selling Price</th>
        <th>Available Qty</th>
        <th>Actions</th>
        
    </tr>
    </thead>
    <tbody>
    @if(isset($medicine))
        @php($sn = 0)
        @foreach($medicine as $medicine)
            <tr>
                <td>{{++$sn}}</td>
                <td>{{$medicine->medicine_name}}</td>
                <td>{{$medicine->selling_price}}</td>
                <td>{{$medicine->total_quantity}}</td>
                <td>
                    <div class="float-mid d-flex">
                        <a href="{{route('medicines.edit',$medicine->id)}}" class="btn btn-outline-primary btn-sm edit mr-2" title="Edit">
                         <i class="fas fa-eye-dropper" title="Edit"></i>
                        </a>

                        <form action="{{route('medicines.destroy',$medicine->id)}}" method="POST">
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
