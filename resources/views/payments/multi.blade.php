@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Post Check</h1>
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        @include('payments.multi_rows')
@endsection
