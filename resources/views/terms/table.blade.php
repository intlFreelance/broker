<table class="table table-responsive" id="contractPayments-table">
    <thead>
        <th>Contract Id</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Amount</th>
        <th>Frequency</th>
        <th colspan="3" class="text-right">Action</th>
    </thead>
    <tbody>
    @foreach($contractPayments as $contractPayment)
        <tr>
            <td>{!! $contractPayment->contract_id !!}</td>
            <td>{!! $contractPayment->start_date !!}</td>
            <td>{!! $contractPayment->end_date !!}</td>
            <td>{!! $contractPayment->amount !!}</td>
            <td>{!! $contractPayment->frequency !!}</td>
            <td class="text-right">
                {!! Form::open(['route' => ['contractPayments.destroy', $contractPayment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contractPayments.show', [$contractPayment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contractPayments.edit', [$contractPayment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
