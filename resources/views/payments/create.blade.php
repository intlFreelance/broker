@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Add New Payment</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row" ng-app="myApp" ng-controller="PaymentCtrl">
        {!! Form::open(['route' => 'payments.store']) !!}

            @include('payments.fields')

        {!! Form::close() !!}
    </div>
@endsection

@section('js')
<script src="/js/contracts.js"></script>
@endsection
