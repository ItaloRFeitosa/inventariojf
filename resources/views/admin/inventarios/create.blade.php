@extends('layouts.app')

@section('title', 'Inventar SJMA - Novo')

@section('content_header')

    <h1><i class="fas fa-boxes"></i> Criando novo inventario</h1>
    
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
