@foreach ($bills as $index => $bill)
<tr>
    <th scope="col">{{$index+1}}</th>
    <td>{{$bill->date}}</td>
    <td>{{$bill->amount_bills}}</td>
    <td>{{ showCurrency('VND', $bill->total_bills)}}</td>
    <td>
        <button class="btn btn-info detail" data-id="{{$bill->date}}">Detail</button>
    </td>
</tr>
@endforeach