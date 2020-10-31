@foreach ($categories as $index => $category)
<tr>
    <th scope="col">{{$index+1}}</th>
    <td>{{$category->name}}</td>
    <td>{!!$category->toHtmlCategoryAttrs()!!}</td>
    <td>
        <button class="btn btn-info edit" data-id="{{$category->slug}}"><i class="far fa-edit"
                style="pointer-events: none"></i></button>
        <button class="btn btn-danger remove" data-id="{{$category->slug}}"><i class="far fa-trash-alt"
                style="pointer-events: none"></i></button>
    </td>
</tr>
@endforeach