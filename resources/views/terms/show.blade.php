@extends('layouts.app')

@section('content')
    @include('contractPayments.show_fields')

    <div class="form-group">
           <a href="{!! route('contractPayments.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
