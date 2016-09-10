@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Contract</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($contract, ['route' => ['contracts.update', $contract->id], 'method' => 'patch']) !!}

            @include('contracts.fields')

            {!! Form::close() !!}
        </div>
@endsection
