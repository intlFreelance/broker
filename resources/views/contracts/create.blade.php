@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Contract</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row" ng-app="myApp" ng-controller="ContractCtrl" ng-init="startLoad()">


            @include('contracts.fields')


    </div>
@endsection

@section('js')
<script src="/js/contracts.js"></script>
@endsection
