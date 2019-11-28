@extends('admin.membros.inventarioMembros')

@section('form')
    @include('admin.membros.includes.formCreate', compact('servidores','inventario', 'lotacoes'))
@stop

