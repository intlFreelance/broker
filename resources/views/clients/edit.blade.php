@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Client</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'patch']) !!}

            @include('clients.fields')

            {!! Form::close() !!}
        </div>
@endsection
