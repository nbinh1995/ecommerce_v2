@foreach ($product_images as $index => $product_image)
<tr>
    <th scope="col">{{$index +1}}</th>
    <td class="text-center"><img src="{{$product_image->path}}" alt="" style="width:auto; height:70px"
            class="img-thumbnail"></td>
    <td class="text-right"><button type="button" class="btn btn-danger remove-image" data-id="{{$product_image->id}}"><i
                class="far fa-trash-alt" style="pointer-events: none"></i></button></td>
</tr>
@endforeach