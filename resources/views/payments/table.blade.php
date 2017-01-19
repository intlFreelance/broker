<table class="table table-responsive" id="contracts-table">
    <thead>
        <th>Client</th>
        <th>Service</th>
        <th>Producer</th>
        <th>Last Payment Date</th>

        <th colspan="3" class="text-right">Action</th>
    </thead>
    <tbody>
    @foreach($contracts as $contract)
        <tr>
            <td>{!! $contract->client->name !!}</td>
            <td></td>
            <td>{!! $contract->producer->last_name  !!}, {!! $contract->producer->first_name  !!}</td>
            <td>{!! isset($contract->payments->first()->payment_date)?date("m/d/Y",strtotime($contract->payments->first()->payment_date)):'Never' !!}</td>
            <td class="text-right">
                {!! Form::open(['route' => ['contracts.destroy', $contract->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! url('payment/create/'.$contract->id) !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-plus"></i> Add Payment</a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
