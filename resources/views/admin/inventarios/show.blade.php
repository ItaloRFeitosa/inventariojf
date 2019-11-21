@extends('layouts.app')

@section('title', 'Inventários Anuais')

@section('content_header')
<h1><i class="fas fa-boxes"></i> {{$inventario->name}}</h1>

@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @include('includes.alerts')
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            
            @include('admin.inventarios.includes.show.infoInventario', compact('inventario'))
        </div>
        <div class="col-md-5">  
            @include('admin.inventarios.includes.show.inventarioMembros', compact('membros'))
        </div>
    </div>
    

@stop