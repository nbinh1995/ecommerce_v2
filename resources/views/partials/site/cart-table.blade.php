@if (!empty($product))
@php
$size = $sizes->filter(function ($value, $key) {
return $value == $item['product_size_id'] ;
});
@endphp
<table class="table-full">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Total</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody class="cart-tbody">
        @foreach ($product['items'] as $key => $item)
        <tr>
            <th>{{ $key +1}}</th>
            <td><img src="{{ $item['product_img']}}" alt="{{ $item['product_name']}}" style="width: 100px"></td>
            <td>{{ $item['product_name']}}</td>
            <td>{{ number_format($item['product_price'])}} VND</td>
            <td>
                <div class="input-group">
                    <span class="input-group__pre" onclick="btnMinus(this)">-</span>
                    <span class="input-group__pre input-group__pre--right" onclick="btnPlus(this)">+</span>
                    <input type="number" class="input-group__display" value="1" min="1" onchange="getChange(this)" />
                </div>
            </td>
            <td>{{$size->name}}</td>
            <td>{{ number_format($item['product_total']) }} VND</td>
            <td>
                <span onclick="getRemove({{ $item['product_id']}})" class="btn-default">X</span>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="8" style="text-align: center">Total: {{number_format($product['total']) }} VND</th>
        </tr>
    </tfoot>
    <caption>Products: {{ $product['count']}} </caption>
</table>
@else
<h1> EMPTY CART !</h1>
@endif