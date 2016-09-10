<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producer', 'Producer:') !!}
    {!! Form::select('producer_id',$producers, null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client:') !!}
    {!! Form::select('client_id',$clients, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contracts.index') !!}" class="btn btn-default">Cancel</a>
</div>
