@extends('layouts.app')

@section('title', 'Inventar SJMA - Comissão')

@section('content_header')

<h1><i class="fas fa-users"></i> Comissão - {{$inventario->name}}</h1>

<ol class="breadcrumb">
        <a href="{{route('inventarios.show', $inventario )}}" class="btn btn-block btn-default">
                <i class="fas fa-arrow-circle-left"></i> Voltar
        </a>
</ol>
<br>
@stop


@section('content')

<div class="row">
    <div class="col-md-12">
        @include('includes.alerts') 
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @yield('form')
        
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title" style="display: inline-block">Lista de Membros</h3>
            </div>
            <div class="box-body">
                    @include('admin.membros.includes.index.tableMembroResponsabilidades', ['membros' => $inventario->membros])
            </div>
        </div>
    </div>
</div>

@stop