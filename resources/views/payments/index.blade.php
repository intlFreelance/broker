@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Payments <a href="{!! url('payment/multi/') !!}" class='btn btn-success btn-sm'><i class="glyphicon glyphicon-check"></i> Post Check</a></h1>
        <div class="input-group pull-right col-md-3" style="margin-top: 25px">
          <div class="input-group-btn">
            <button type="button" class="btn btn-default" style="line-height: 0.4;"><span class="glyphicon glyphicon-search"></span></button>
          </div>
          <input type="text" id="search" class="form-control"  style="height:40px;">
        </div>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('payments.table')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
@endsection
