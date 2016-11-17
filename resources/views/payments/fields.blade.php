<input type="hidden" name="contract_id" class="form-control" value="{{$contract->id}}"/>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client', 'Client:') !!}
    <input type="text" name="client" class="disabled form-control" disabled value="{{$contract->client->name}}"/>
    <input type="hidden" name="client_id" class="form-control" value="{{$contract->client->id}}"/>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('producer', 'Producer:') !!}
    <input type="text" name="producer" class="disabled form-control" disabled value="{{$contract->producer->first_name.' '.$contract->producer->last_name}}"/>
    <input type="hidden" name="producer_id" class="form-control" value="{{$contract->producer->id}}"/>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <input type="date" name="payment_date" class=" form-control"  value="{{date("Y-m-d")}}"/>
</div>
<div class="form-group col-sm-2">
    {!! Form::label('contract_amount', 'Contract Amount:') !!}

    <input type="text" name="contract_amount" disabled class="disabled form-control"  value="${{$contract->contract_payments->first()->amount}}"/>
</div>
<div class="form-group col-sm-4">
    {!! Form::label('payment_amount', 'Payment Amount:') !!}
    <input type="text" name="amount" class="form-control"  value="${{$contract->contract_payments->first()->amount}}"/>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('payments.index') !!}" class="btn btn-default">Cancel</a>
</div>
