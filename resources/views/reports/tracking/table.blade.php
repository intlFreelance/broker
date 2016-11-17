<table class="table table-responsive sorter" id="contracts-table">
    <thead>
        <th>Client</th>
        <th>Producer</th>
        <th>Amount Expected</th>
        <th>Amount Paid</th>
        <th>Difference</th>
        <th>Payment Date</th>
    </thead>
    <tbody>
    @foreach($contract_payments as $contract_payment)
      <?php
      if(isset($contract_payment->contract->payments->last()->amount)){
        if($contract_payment->contract->payments->last()->amount == $contract_payment->amount){
          echo '<tr style="background:#FEFEFE">';
        }elseif($contract_payment->contract->payments->last()->amount < $contract_payment->amount){
          echo '<tr style="background:#FFE6EA">';
        }else{
          echo '<tr style="background:#E6FFEA">';
        }
      }else{
        echo '<tr style="background:#FFE6EA">';
      }
      ?>
          <td>{{ isset($contract_payment->contract->client->name)?$contract_payment->contract->client->name:'' }}</td>
          <td>{{$contract_payment->producer->last_name}}, {{$contract_payment->producer->first_name}}</td>
          <td>${{$contract_payment->amount}}</td>
          <td>{{isset($contract_payment->contract->payments->last()->amount)?'$'.$contract_payment->contract->payments->last()->amount:'NA'}}</td>
          <td>
            <?php
              if(isset($contract_payment->contract->payments->last()->amount)){
                if($contract_payment->contract->payments->last()->amount == $contract_payment->amount){
                  echo '<b>$0</b>';
                }elseif($contract_payment->contract->payments->last()->amount < $contract_payment->amount){
                  echo '<b style="color:#F00;">-$'.($contract_payment->amount-$contract_payment->contract->payments->last()->amount).'</b>';
                }else{
                  echo '<b>$'.($contract_payment->amount-$contract_payment->contract->payments->last()->amount).'</b>';
                }
              }else{
                echo '<b style="color:#F00;">-$'.$contract_payment->amount.'</b>';
              }
            ?>
          </td>
          <td>{{isset($contract_payment->contract->payments->last()->payment_date)?date('m/d/Y',strtotime($contract_payment->contract->payments->last()->payment_date)):'NA'}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
