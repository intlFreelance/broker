<table class="table table-responsive sorter" id="contracts-table">
    <thead>
        <th>Client</th>
        <th>Producer</th>
        <th>Payment Date</th>
        <th>Amount</th>
        <th colspan="3" class="text-right">Action</th>
    </thead>
    <tbody>
      @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->client->name}}</td>
            <td>{{ $payment->producer->last_name}}, {{ $payment->producer->first_name}}</td>
            <td>{{ date('m/d/Y',strtotime($payment->payment_date)) }}</td>
            <td>${{ $payment->amount}}</td>
            <td class="text-right">
                <div class='btn-group'>
                    <a href="#" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i> Edit Payment</a>
                </div>
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
