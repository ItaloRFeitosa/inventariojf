@if($inventario->isAtivo())
<div class="box box-info">
        
@else
<div class="box box-success">
@endif
    <div class="box-header with-border">
        <h3 class="box-title" style="display: inline-block">Membros da Comissão</h3>

        @if($inventario->isAtivo())
        <a href="{{route('inventario.membros.index',$inventario)}}" class="btn btn-success btn-sm pull-right"><i class="fas fa-plus"></i> Adicionar Membro</a>
        @endif
        
    </div>
    
    <div class="box-body">
        @include('admin.membros.includes.index.tableMembros', compact('membros'))
    </div>
</div>

