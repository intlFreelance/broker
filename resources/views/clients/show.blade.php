@extends('layouts.app')

@section('content')
    @include('clients.show_fields')

    <div class="form-group">
           <a href="{!! route('clients.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
