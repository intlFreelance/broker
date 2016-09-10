@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Producer</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($producer, ['route' => ['producers.update', $producer->id], 'method' => 'patch']) !!}

            @include('producers.fields')

            {!! Form::close() !!}
        </div>
@endsection
