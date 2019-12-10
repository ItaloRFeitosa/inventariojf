@extends('layouts.app')

@section('title', 'Inventar SJMA - Novo')

@section('content_header')

    <h1>
        <a class="btn-default"  title="Voltar" href="{{route('inventarios.index')}}" >
            <i class="fas fa-chevron-circle-left"></i> 
        </a>
        <i class="fas fa-boxes"></i> Novo inventario
    </h1>
    
@stop

@section('content')

<div class="row">
    <div class="col-md-8">

        @include('includes.alerts')
        <div class="row">
            <div class="col-md-12">
                @include('admin.inventarios.includes.formCreate')
            </div>
        </div>

    </div>
</div>

@stop
