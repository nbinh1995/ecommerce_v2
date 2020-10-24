<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Amount</th>
            <th scope="col">Product Size</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $product)
        <tr>
            <th scope="col">{{$index+1}}</th>
            <td>{{$product->name}}</td>
            <td>{{ showCurrency('VND', $bill->price)}}</td>
            <td>{{$product->amount}}</td>
            <td>{{$product->size}}</td>
            <td>{{ showCurrency('VND', $bill->total_detail)}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Amount</th>
            <th scope="col">Product Size</th>
            <th scope="col">Total</th>
        </tr>
    </tfoot>
</table>