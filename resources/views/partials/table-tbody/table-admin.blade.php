@foreach ($admins as $index => $admin)
<tr>
    <th scope="col">{{$index+1}}</th>
    <td>{{$admin->name}}</td>
    <td>{{$admin->email}}</td>
    <td>{{$admin->phone}}</td>
    <td>{{$admin->address}}</td>
    <td>{{$admin->last_login_at}}</td>
    @if (Auth::user()->id == 1)
    <td>
        <button class="btn btn-info edit" data-id="{{$admin->id}}"><i class="far fa-edit"
                style="pointer-events: none"></i></button>
        <button class="btn btn-danger remove" data-id="{{$admin->id}}"><i class="far fa-trash-alt"
                style="pointer-events: none"></i></button>
    </td>
    @endif
</tr>
@endforeach