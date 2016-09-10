<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $contractPayment->id !!}</p>
</div>

<!-- Contract Id Field -->
<div class="form-group">
    {!! Form::label('contract_id', 'Contract Id:') !!}
    <p>{!! $contractPayment->contract_id !!}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{!! $contractPayment->start_date !!}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{!! $contractPayment->end_date !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $contractPayment->amount !!}</p>
</div>

<!-- Frequency Field -->
<div class="form-group">
    {!! Form::label('frequency', 'Frequency:') !!}
    <p>{!! $contractPayment->frequency !!}</p>
</div>

