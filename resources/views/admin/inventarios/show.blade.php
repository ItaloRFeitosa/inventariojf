@extends('layouts.app')

@section('title', 'Inventar SJMA - Detalhes')

@section('content_header')

<h1>
    
    <a class="btn-default"  title="Voltar" href="{{route('inventarios.index')}}" >
        <i class="fas fa-chevron-circle-left"></i> 
    </a>
    
    <i class="fas fa-boxes"></i> {{$inventario->name}}


    <div class="pull-right">
        @if($inventario->isPreColeta())
            <p class="btn btn-block btn-info disabled">
                    <i class="far fa-hourglass"></i> Pré Coleta
            </p>
        @elseif($inventario->isColetaAtiva())
            <p class="btn btn-block btn-info disabled">
                    <i class="fas fa-hourglass"></i> Em Coleta
            </p>
        @elseif($inventario->isPosColeta())
            <p class="btn btn-block btn-warning disabled">
                    <i class="fas fa-hourglass"></i> Coleta Finalizada
            </p>
        @elseif(!$inventario->isAtivo())
            <p class="btn btn-block btn-success disabled">
                    <i class="fas fa-check"></i> Inventario Finalizado
            </p>
        @endif
    </div>

</h1>

</br>

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alerts')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.inventarios.includes.show.dashboardInventario')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('admin.inventarios.includes.show.infoInventario', compact('inventario'))
        </div>
        <div class="col-md-6">  
            @include('admin.inventarios.includes.show.inventarioMembros', compact('inventario', 'membros'))
        </div>
        {{-- <div class="col-md-1">
            @include('admin.inventarios.includes.show.acoesInventario', compact('inventario'))
        </div> --}}
    </div>
    

@stop