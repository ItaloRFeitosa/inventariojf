@extends('layouts.app')

@section('title', 'Inventar SJMA - Membro')

@section('content_header')

<h1>

    <a class="btn-default"  title="Voltar" href="{{route('inventarios.show', [$membro->inventario, $membro])}}" >
        <i class="fas fa-chevron-circle-left"></i> 
    </a>
    
    <i class="fas fa-user"></i> {{$inventario->name}} - {{$membro->servPessoal()->no_servidor}}
    
    @if($membro->flag_adm)
    <span class="label label-success">ADM</span>
    @endif

    <div class="pull-right">   
        @if($inventario->isAtivo())
            @if($inventario->isPreColeta())
                <p class="btn btn-block btn-info disabled">
                        <i class="far fa-hourglass"></i> Pré Coleta
                </p>
            @elseif($inventario->isColetaAtiva())
                <p class="btn btn-block btn-info disabled">
                        <i class="fas fa-hourglass-half"></i> Em Coleta
                </p>
            @elseif($inventario->isPosColeta())
                <p class="btn btn-block btn-warning disabled">
                        <i class="fas fa-hourglass"></i> Coleta Finalizada
                </p>
            @endif
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
            @include('admin.membros.includes.show.dashboardInventarioMembro')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.membros.includes.show.infoMembroResponsabilidades')
        </div>
        {{-- <div class="col-md-1">
            @include('admin.membros.includes.show.acoesMembro')
        </div>  --}}
    </div>
    

@stop