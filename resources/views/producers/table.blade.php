<table class="table table-responsive" id="producers-table">
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th colspan="3" class="text-right">Action</th>
    </thead>
    <tbody>
    @foreach($producers as $producer)
        <tr>
            <td>{!! $producer->first_name !!}</td>
            <td>{!! $producer->last_name !!}</td>
            <td>{!! $producer->email !!}</td>
            <td class="text-right">
                {!! Form::open(['route' => ['producers.destroy', $producer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('producers.show', [$producer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('producers.edit', [$producer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
