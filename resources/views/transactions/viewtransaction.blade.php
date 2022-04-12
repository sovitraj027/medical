<table class="table">
    <thead>
    <tr>
        <th>SN:</th>
        <th>customer Name</th>
        <th>Medicine Name</th>
        <th>Sell Price</th>
        <th>Taken Quantity</th>
        <th>Bought Date</th>
        
    </tr>
    </thead>
    <tbody>
        {{-- @if(isset($medicines)) --}}
        {{-- @php($sn = 0)    --}}
        
        @forelse($medicines as $medicine)
        {{-- {{dd($medicine)}} --}}
            <tr>
                <td>{{$loop->iteration}}</td>
                <td> {{$medicine->customer_name}}</td>
                 <td>{{$medicine->medicine->medicine_name}}</td> 
                <td>{{$medicine->quantity}}</td>
                <td>{{$medicine->medicine->selling_price}}</td>
                <td>{{$medicine->buy_date}}</td>
               
            </tr>
            @empty
            <td>No any medicine yet</td>
            @endforelse
        {{-- @endif --}}
    </tbody>
</table>
