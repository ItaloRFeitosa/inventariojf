<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title" style="display: inline-block">Inventários Ativos</h3>
        <a href="{{route('inventarios.create')}}" class="btn btn-success btn-sm pull-right"><i class="fas fa-plus"></i> Criar Novo Inventário</a>
    </div>
    <div class="box-body">
        <div class="row">
            
            @foreach ($inventariosAtivos as $inventario)
            <div class="col-md-4">
                @include('admin.inventarios.includes.index.boxInventario', compact('inventario'))
            </div>
            @endforeach
                
            
        </div>
    </div>
</div>