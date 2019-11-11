@if($inventario->ativo == 1)
<div class="small-box bg-aqua">
@else
<div class="small-box bg-green">
@endif
    <div class="inner">
        <h3>{{$inventario->ano}}</h3>
        
        <p>{{$inventario->name}}</p>
    </div>
    
    @if($inventario->ativo == 1)
    <div class="icon"><i class="fas fa-spinner"></i></div>
    @else
    <div class="icon"><i class="far fa-calendar-check"></i></div>
    @endif
    <a href="{{route('inventarios.show', $inventario)}}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
</div>





