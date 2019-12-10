@extends('layouts.app')

@section('title', 'Inventar SJMA - Responsabilidades')

@section('content_header')

<h1>

    <a class="btn-default"  title="Voltar" href="{{route('inventario.membros.index',$membro->inventario)}}" >
        <i class="fas fa-chevron-circle-left"></i> 
    </a>

    <i class="fa fa-fw fa-sitemap"></i> {{$inventario->name}} - {{$membro->servPessoal()->no_servidor}}

    @if($membro->flag_adm)
    <span class="label label-success">ADM</span>
    @endif

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
        @include('admin.membros.includes.formEdit', compact('membro'))
    </div>
</div>

<div class="row">
    <div class="col-md-12">
            @include('admin.membros.includes.index.tableResponsabilidades', compact('lotacoes','membro'))
    </div>
</div>

@stop