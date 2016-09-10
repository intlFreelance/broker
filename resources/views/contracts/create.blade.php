@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Contract</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'contracts.store']) !!}

            @include('contracts.fields')

        {!! Form::close() !!}
    </div>
@endsection

@section('js')
<script src="/js/contract.js"></script>
@endsection
