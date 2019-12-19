@extends('layouts.app')

@section('title', 'Inventar SJMA - Detalhes')

@section('content_header')
<h1><i class="fas fa-boxes"></i> {{$responsabilidade->membro->inventario->name}} - {{$responsabilidade->lotacao()->lota_dsc_lotacao}}</h1>

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alerts')
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-12">
            @include('admin.inventarios.includes.show.dashboardInventario')
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-12">
            @include('admin.responsabilidades.includes.showSetores', compact('responsabilidade'))
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-md-12">
            @include('admin.responsabilidades.includes.tableTombos', compact('setor'))
        </div>
        
    </div>
    

@stop