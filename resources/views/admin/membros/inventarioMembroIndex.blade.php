@extends('layouts.app')

@section('title', 'Inventar SJMA - Comissão')

@section('content_header')

<h1><i class="fas fa-users"></i> Comissão - {{$inventario->name}}</h1>
    
@stop


@section('content')

<div class="row">
    <div class="col-md-10">
        @include('includes.alerts') 
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        @include('admin.membros.includes.formCreate', compact('servidores','inventario', 'lotacoes'))
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title" style="display: inline-block">Lista de Membros</h3>
            </div>
            <div class="box-body">
                    @include('admin.membros.includes.index.tableMembros', ['membros' => $inventario->membros])
            </div>
        </div>
    </div>
</div>

@stop