@extends('admin.membros.inventarioMembros')

@if($inventario->isPreColeta() || $inventario->isColetaAtiva())
    @section('form')
        @include('admin.membros.includes.formCreate', compact('servidores','inventario', 'lotacoes'))
    @stop
@endif

