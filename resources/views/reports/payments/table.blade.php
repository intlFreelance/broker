<table class="table table-responsive sorter" id="contracts-table">
    <thead>
        <th>Client</th>
        <th>Producer</th>
        <th>Payment Date</th>
        <th>Amount</th>
        <th class="text-right">Action</th>
    </thead>
    <tbody>
      <?php $total_payments = 0; ?>
      @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->client->name}}</td>
            <td>{{ $payment->producer->last_name}}, {{ $payment->producer->first_name}}</td>
            <td>{{ date('m/d/Y',strtotime($payment->payment_date)) }}</td>
            <td>${{ $payment->amount }}</td>
            <td class="text-right">
                <div class='btn-group'>
                    <a href="#" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i> Edit Payment</a>
                </div>
            </td>
        </tr>
        <?php $total_payments += $payment->amount; ?>
      @endforeach
      <tr>
          <td colspan="3"  class="text-right"><b>Total:</b></td>
          <td>${{ $total_payments }}</td>
          <td class="text-right">
          </td>
      </tr>
    </tbody>
</table>
