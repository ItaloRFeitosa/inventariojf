@extends('admin.membros.inventarioMembros')

@section('form')
    @include('admin.membros.includes.formEdit', compact('lotacoes', 'membro'))
@stop