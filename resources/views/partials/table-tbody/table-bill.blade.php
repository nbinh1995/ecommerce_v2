@foreach ($bills as $index => $bill)
<tr>
    <th scope="col">{{$index+1}}</th>
    <td>{{$bill->name}}</td>
    <td>{{$bill->email}}</td>
    <td>{{$bill->address}}</td>
    <td>{{$bill->phone}}</td>
    <td>{{$bill->note}}</td>
    <td>{{ showCurrency('VND', $bill->total_bill)}}</td>
    <td>{{$bill->created_at}}</td>
    <td>{{$bill->status}}</td>
    <td>
        <button class="btn btn-sm m-1 btn-info detail-bill" data-id="{{$bill->id}}">Detail</button>
        <details style="position: relative">
            <summary class="btn btn-sm m-1 btn-primary">Status</summary>
            <div style="position: absolute;
            right: 100%;
            top: 0;
            z-index: 99;
            padding: 10px;
            background-color:white;
            box-shadow: 0px 1px 5px 5px rgb(0,0,0,0.1);">
                <button class="btn btn-xs mb-1 mx-auto btn-outline-secondary status-bill" data-id="{{$bill->id}}"
                    style="display: block">Completed</button>
                <button class="btn btn-xs mb-1 mx-auto btn-outline-secondary status-bill" data-id="{{$bill->id}}"
                    style="display: block">Confirmed</button>
                <button class="btn btn-xs mb-1 mx-auto btn-outline-secondary status-bill" data-id="{{$bill->id}}"
                    style="display: block">Pending</button>
                <button class="btn btn-xs mb-1 mx-auto btn-outline-secondary status-bill" data-id="{{$bill->id}}"
                    style="display: block;">Cancel</button>
            </div>
        </details>
    </td>
</tr>
@endforeach