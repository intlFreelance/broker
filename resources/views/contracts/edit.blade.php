@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Contract</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row" ng-app="myApp" ng-controller="ContractCtrl" ng-init="getTerms(1)">
            {!! Form::model($contract, ['route' => ['contracts.update', $contract->id], 'method' => 'patch']) !!}

            @include('contracts.fields')

            {!! Form::close() !!}
        </div>
@endsection

@section('js')
<script src="/js/contracts.js"></script>
@endsection
