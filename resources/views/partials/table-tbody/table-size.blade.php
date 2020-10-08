@foreach ($sizes as $index => $size)
<tr>
    <th scope="col">{{$index+1}}</th>
    <td>{{$size->name}}</td>
    <td>
        <button class="btn btn-info edit" data-id="{{$size->id}}"><i class="far fa-edit"
                style="pointer-events: none"></i></button>
        <button class="btn btn-danger remove" data-id="{{$size->id}}"><i class="far fa-trash-alt"
                style="pointer-events: none"></i></button>
    </td>
</tr>
@endforeach