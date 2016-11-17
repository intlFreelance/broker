@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Payments</h1>
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
<script>
$(function() {
  $("#search").on("keyup",function(){
    if($(this).val() == "abc"){
      $('table tr:eq(1), table tr:eq(2)').hide();
    }
  });
});
</script>
@endsection
