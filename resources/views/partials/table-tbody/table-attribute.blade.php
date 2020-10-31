@foreach ($attrs as $index => $attr)
<tr>
    <th scope="col">{{$index+1}}</th>
    <td>{{$attr->attr_name}}</td>
    <td>{!!$attr->toHtmlAttrValues()!!}</td>
    <td>
        <button class="btn btn-info edit" data-id="{{$attr->id}}"><i class="far fa-edit"
                style="pointer-events: none"></i></button>
        <button class="btn btn-danger remove" data-id="{{$attr->id}}"><i class="far fa-trash-alt"
                style="pointer-events: none"></i></button>
    </td>
</tr>
@endforeach