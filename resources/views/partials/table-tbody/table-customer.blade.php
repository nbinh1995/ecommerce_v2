@foreach ($customers as $index => $customer)
<tr>
    <th scope="col">{{$index+1}}</th>
    <td>{{$customer->name}}</td>
    <td>{{$customer->email}}</td>
    <td>{{$customer->phone}}</td>
    <td>{{$customer->address}}</td>
    <td>{{$customer->last_login_at}}</td>
    <td>
        <button class="btn btn-info detail" data-id="{{$customer->id}}">Detail</button>
        <button class="btn btn-danger ban" data-id="{{$customer->id}}">Ban</button>
    </td>
</tr>
@endforeach