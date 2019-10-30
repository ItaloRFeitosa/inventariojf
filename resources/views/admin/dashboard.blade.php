@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<h1><i class="fas fa-columns"></i>Dashboard</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-8">
        @include('includes.alerts')
    </div>
    <div class="col-md-4">

    </div>
</div>
@stop