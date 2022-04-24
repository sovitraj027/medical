<table>
    <thead>
        <tr>
            <th>Medicine_name</th>
            <th>Cost_Price</th>
            <th>Selling_price</th>
            <th>Quantity</th>
            <th>Manufacturer_date</th>
            <th>Expiry_date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($medicinestock as $stock)
          
            <tr>
                <td>{{$stock->medicine->medicine_name}}</td>
                <td>{{$stock->cost_price}}</td>
                <td>{{$stock->medicine->selling_price}}</td>
                <td>{{$stock->quantity}}</td>
                <td>{{$stock->manufactured_date}}</td>
                <td>{{$stock->expiry_date}}</td>

            </tr>
        @endforeach
    </tbody>
</table>