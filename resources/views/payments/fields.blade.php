<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client', 'Client:') !!}
    <input type="text" name="client" class="disabled form-control" disabled value="{{$contract->client->name}}"/>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('producer', 'Producer:') !!}
    <input type="text" name="producer" class="disabled form-control" disabled value="{{$contract->producer->first_name.' '.$contract->producer->last_name}}"/>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <input type="date" name="payment_date" class=" form-control"  value="{{date("Y-m-d")}}"/>
</div>
<div class="form-group col-sm-2">
    {!! Form::label('contract_amount', 'Contract Amount:') !!}
    <input type="text" name="contract_amount" disabled class="disabled form-control"  value="$500"/>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('payment_amount', 'Payment Amount:') !!}
    <input type="text" name="payment_amount" class="form-control"  value="$500"/>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('payments.index') !!}" class="btn btn-default">Cancel</a>
</div>
