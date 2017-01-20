@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Contract</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row" ng-app="myApp" ng-controller="ContractCtrl" ng-init="startLoad('$scope.getTerms({{$contract->id}});$scope.setBase({{$contract->client_id}},{{$contract->producer_id}});')">
            {!! Form::model($contract, ['route' => ['contracts.update', $contract->id], 'method' => 'patch']) !!}

            @include('contracts.fields')

            {!! Form::close() !!}
        </div>
@endsection

@section('js')
<script src="/js/contracts.js"></script>
@endsection
