@extends('layouts.app')

@section('title', 'Inventários Anuais')

@section('content_header')

    {{-- <h1><i class="fas fa-boxes"></i> Estado dos Inventários</h1> --}}
    


@stop

@section('content')

<div class="row">
    <div class="col-md-8">
        @include('includes.alerts')
        <div class="row">
            <div class="col-md-12">
                @include('admin.inventarios.includes.index.inventariosAtivos')
            </div>
        
        </div>
        <div class="row">
            
            <div class="col-md-12">
                
                @include('admin.inventarios.includes.index.inventariosFinalizados')
            </div>
            
        </div>

        
    </div>


</div>

@stop
