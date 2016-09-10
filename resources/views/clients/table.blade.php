<table class="table table-responsive" id="clients-table">
    <thead>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th colspan="3" class="text-right">Action</th>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{!! $client->name !!}</td>
            <td>{!! $client->address !!}</td>
            <td>{!! $client->city !!}</td>
            <td>{!! $client->state !!}</td>
            <td>{!! $client->zip !!}</td>
            <td class="text-right">
                {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('clients.show', [$client->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('clients.edit', [$client->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
