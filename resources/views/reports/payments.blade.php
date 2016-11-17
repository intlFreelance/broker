@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Payments</h1>

        <div class="input-group pull-right col-md-3" style="margin-top: 25px">
          <div class="input-group-btn">
            <button type="button" class="btn btn-default" style="line-height: 0.4;"><span class="glyphicon glyphicon-search"></span></button>
          </div>
          <input type="text" id="search" class="form-control"  style="height:40px;">
        </div>

        <div class="pull-right"><button type="button" class="btn btn-primary" style="margin-top:25px;line-height: 0.4; margin-right:5px;"><span class="glyphicon glyphicon-export"></span> Export to CSV</button></div>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('reports.payments.table')

@endsection
