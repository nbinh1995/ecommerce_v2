@foreach ($banneds as $index => $banned)
<tr>
    <th scope="col">{{$index+1}}</th>
    <td>{{$banned->name}}</td>
    <td>{{$banned->email}}</td>
    <td>{{$banned->phone}}</td>
    <td>{{$banned->address}}</td>
    <td>{{$banned->last_login_at}}</td>
    <td>
        <button class="btn btn-info restore" data-id="{{$banned->id}}">Restore</button>
    </td>
</tr>
@endforeach