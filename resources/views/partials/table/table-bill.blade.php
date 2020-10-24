<table class="table table-bordered" id="bills-of-customer-table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Note</th>
            <th scope="col">Total Bill</th>
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
            <td>{{$bill->total_bill}}</td>
            <td>{{$bill->created_at}}</td>
            <td>{{$bill->status}}</td>
            <td>
                <button class="btn btn-sm m-1 btn-info detail-bill" data-id="{{$bill->id}}">Detail</button>
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
            <th scope="col">Total Bill</th>
            <th scope="col">Created_at</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </tfoot>
</table>