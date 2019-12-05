@extends('layouts.app')

@section('title', 'Inventar SJMA - Comissão')

@section('content_header')

<h1>

    <a class="btn-default"  title="Voltar" href="{{route('inventarios.show', $inventario )}}" >
        <i class="fas fa-chevron-circle-left"></i> 
    </a>

    <i class="fas fa-users"></i> Comissão - {{$inventario->name}}

</h1>

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
        <div class="box box-info">
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