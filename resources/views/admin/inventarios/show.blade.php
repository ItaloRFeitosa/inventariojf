@extends('layouts.app')

@section('title', 'Inventar SJMA - Detalhes')

@section('content_header')
<h1><i class="fas fa-boxes"></i> {{$inventario->name}}</h1>

    <ol class="breadcrumb">
        @if($inventario->isColetaAtiva())
            <button type="button" class="btn btn-block btn-info disabled">
                    <i class="fas fa-hourglass-half"></i> Em Coleta
            </button>
        @elseif($inventario->isPosColeta())
            <a href="{{route('inventarios.finalizar', $inventario->id)}}" class="btn btn-block btn-warning" 
                onclick="return confirm('Deseja realmente finalizar o inventario?');">
                <i class="fas fa-stop"></i> Finalizar
            </a>
        @elseif(!$inventario->isAtivo())
            <a href="{{route('inventarios.reativar', $inventario->id)}}" class="btn btn-block btn-default"  
                onclick="return confirm('Deseja realmente reativar o inventario?');">
                <i class="fas fa-play"></i> Reativar
            </a>
        @endif
    </ol>
    
</br>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @include('includes.alerts')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.inventarios.includes.show.dashboardInventario')
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            @include('admin.inventarios.includes.show.infoInventario', compact('inventario'))
        </div>
        <div class="col-md-5">  
            @include('admin.inventarios.includes.show.inventarioMembros', compact('membros'))
        </div>
        <div class="col-md-2">
            @include('admin.inventarios.includes.show.acoesInventario', compact('inventario'))
        </div>
    </div>
    

@stop