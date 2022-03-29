<table class="table">
    <thead>
    <tr>
        <th>SN:</th>
        <th>Medicine Name</th>
        <th>Cost Price</th>
        <th>Supplier Name</th>
        <th>Available Qty</th>
        <th>Actions</th>
        
    </tr>
    </thead>
    <tbody>
        @if(isset($medicine))
        @php($sn = 0)   
        @forelse($medicine as $medicine)
            <tr>
                <td>{{++$sn}}</td>
                <td> {{$medicine->medicine->medicine_name}}</td>
                <td>{{$medicine->cost_price}}</td>
                <td>{{$medicine->supplier_name}}</td>
                <td>{{$medicine->quantity}}</td>
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
            @empty
            <td>No any medicine yet</td>
        @endforelse
        @endif
    </tbody>
</table>
