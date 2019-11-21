<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title" style="display: inline-block">Finalizados</h3>
        <a href="#" class="btn btn-info btn-sm pull-right"></i> Mostrar Todos</a>
    </div>
    <div class="box-body">
        <div class="row">
            @foreach ($inventariosFinalizados as $inventario)
            <div class="col-md-4">
                @include('admin.inventarios.includes.index.boxInventario', compact('inventario'))
            </div>
            @endforeach
            
        </div>
    </div>
</div>