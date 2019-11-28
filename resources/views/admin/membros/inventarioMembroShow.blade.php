@extends('layouts.app')

@section('title', 'Inventar SJMA - Membro')

@section('content_header')
<h1><i class="fas fa-boxes"></i> {{$inventario->name}} - {{$membro->servPessoal()->no_servidor}}
    @if($membro->flag_adm)
    <span class="label label-success">ADM</span>
    @endif
</h1>

    <ol class="breadcrumb">
        
        @if($inventario->isAtivo())
            @if($inventario->isColetaAtiva())
                <a href="{{route('inventarios.show',$inventario )}}" class="btn btn-block btn-info">
                    <i class="fas fa-hourglass-half"></i> Em Coletar
                </a>
            @elseif($inventario->isPosColeta())
                <a href="{{route('inventarios.show',$inventario )}}" class="btn btn-block btn-warning">
                    <i class="fas fa-hourglass"></i> Coleta Finalizada
                </a>
            @endif
        @elseif(!$inventario->isAtivo())
            <a href="{{route('inventarios.show',$inventario )}}" class="btn btn-block btn-success">
                <i class="fas fa-check"></i> Inventario Finalizado
            </a>
        @endif
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