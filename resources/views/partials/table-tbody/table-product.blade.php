@foreach ($products as $index => $product)
<tr>
    <th scope="col">{{ $index+1 }}</th>
    <td><img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 100px; height:auto"></td>
    <td>{{ $product->category->name }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ showCurrency('VND', $product->price)}}</td>
    <td>{!! $product->toHtmlNew() !!}</td>
    <td>
        <button class="btn btn-info edit" data-id="{{ $product->slug }}"><i class="far fa-edit"
                style="pointer-events: none"></i></button>
        <button class="btn btn-danger remove" data-id="{{ $product->slug }}"><i class="far fa-trash-alt"
                style="pointer-events: none"></i></button>
    </td>
</tr>
@endforeach