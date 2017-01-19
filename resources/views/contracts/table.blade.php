<table class="table table-responsive" id="contracts-table">
    <thead>
        <th>Client</th>
        <th>Producer</th>
        <th class="text-center">Renewal Month</th>
        <th colspan="3" class="text-right">Action</th>
    </thead>
    <tbody>
    @foreach($contracts as $contract)
        <tr>
            <td>{!! $contract->client->name !!}</td>
            <td>{!! $contract->producer->last_name  !!}, {!! $contract->producer->first_name  !!}</td>
            <td class="text-center">{!! isset($contract->terms->first()->end_date)?date('m/Y',strtotime($contract->terms->first()->end_date)):''  !!}</td>
            <td class="text-right">
                {!! Form::open(['route' => ['contracts.destroy', $contract->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contracts.show', [$contract->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contracts.edit', [$contract->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
