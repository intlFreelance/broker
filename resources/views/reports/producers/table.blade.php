<table class="table table-responsive sorter" id="contracts-table">
    <thead>
        <th>Company</th>
        <th>Producer</th>
        <th>Date</th>
        <th>Amount Paid</th>
        <th>Split</th>
        <th>Due to Producer</th>
    </thead>
    @foreach($producers as $producer)
      <?php
      $total = 0;
      foreach($producer->payments as $payment){
        $total += $payment->amount*.20 ;
      }
      ?>
      <thead>
          <th colspan="5" style="background:#F1F1F1">{{$producer->last_name}}, {{$producer->first_name}}</th>
          <th colspan="5" style="background:#F1F1F1"><b>${{$total}}</b></th>
      </thead>
      @foreach($producer->payments as $payment)
        <tbody>
            <tr  style="margin-left:10px;">
                <td style="padding-left:50px;">{{ $payment->client->name }}</td>
                <td>{{$producer->last_name}}, {{$producer->first_name}}</td>
                <td>{{ date('m/d/Y',strtotime($payment->payment_date)) }}</td>
                <td>${{ $payment->amount }}</td>
                <td>20%</td>
                <td>${{ $payment->amount*.20 }}</td>
            </tr>
        </tbody>
      @endforeach
    @endforeach
</table>
