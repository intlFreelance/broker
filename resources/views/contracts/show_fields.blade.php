
<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client:') !!}
    <p>{!! $contract->client->name !!}</p>
</div>

<!-- Producer Id Field -->
<div class="form-group">
    {!! Form::label('producer_id', 'Producer:') !!}
    <p>{!! $contract->producer->last_name.', '.$contract->producer->first_name !!}</p>
</div>
