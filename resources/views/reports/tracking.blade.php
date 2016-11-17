@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Tracking Payments</h1>
        <div style="margin-top:25px;">
          <input type="date" id="to" class="pull-right form-control col-md-3"  style="height:40px;width: 20%;" value="2016-11-30">
          <div class="pull-right" style="padding: 10px;"> to </div> <input type="date" id="from" class="pull-right form-control col-md-3"  style="height:40px;width: 20%;"  value="2016-11-01">
        </div>

        <div class="pull-right"><a href="{{ url('reporting/tracking/export') }}" class="btn btn-primary" style="line-height: 0.4; margin-right:5px;"><span class="glyphicon glyphicon-export"></span> Export to CSV</a></div>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('reports.tracking.table')

@endsection
