@extends('layouts.app')

@section('content')
    @include('producers.show_fields')

    <div class="form-group">
           <a href="{!! route('producers.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
