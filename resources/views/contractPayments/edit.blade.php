@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit ContractPayment</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($contractPayment, ['route' => ['contractPayments.update', $contractPayment->id], 'method' => 'patch']) !!}

            @include('contractPayments.fields')

            {!! Form::close() !!}
        </div>
@endsection
