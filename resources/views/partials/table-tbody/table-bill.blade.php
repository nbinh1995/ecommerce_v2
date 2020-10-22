<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Note</th>
            <th scope="col">Delivery</th>
            <th scope="col">Created At</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bills as $index => $bill)
        <tr>
            <th scope="col">{{$index+1}}</th>
            <td>{{$bill->name}}</td>
            <td>{{$bill->email}}</td>
            <td>{{$bill->address}}</td>
            <td>{{$bill->phone}}</td>
            <td>{{$bill->note}}</td>
            <td>{{$bill->delivery}}</td>
            <td>{{$bill->created_at}}</td>
            <td>{{$bill->status}}</td>
            <td>
                <button class="btn btn-info detail-bill" data-id="{{$bill->id}}">Detail</button>

                <details>
                    <button class="btn btn-primary">Status</button>
                    <div>
                        <button class="btn btn-xs btn-outline-secondary status-bill"
                            data-id="{{$bill->id}}">Pending</button>
                        <button class="btn btn-xs btn-outline-secondary status-bill"
                            data-id="{{$bill->id}}">Pending</button>
                    </div>
                </details>

            </td>
        </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Note</th>
            <th scope="col">Delivery</th>
            <th scope="col">Created_at</th>
        </tr>
    </tfoot>
</table>