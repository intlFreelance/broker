@extends('layouts.app')

@section('content')
    @include('contracts.show_fields')

    <div class="form-group">
           <a href="{!! route('contracts.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
