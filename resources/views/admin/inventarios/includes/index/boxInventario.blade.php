@if($inventario->ativo == 1)
<div class="small-box bg-aqua">
@else
<div class="small-box bg-green">
@endif
    <div class="inner">
        <h3>{{$inventario->ano}}</h3>
        
        <p>{{$inventario->name}}</p>
        <p>{{$inventario->localidade}}</p>
        
        @if($inventario->ativo == 1)
        <div class="progress progress-xxs active">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" 
                style="width: {{ 
                ( ( ($inventario->duracao()-$inventario->tempoFinalizacao()) / $inventario->duracao() )*100) }}">
                </div>
        </div>
        <span class="progress-description">
            Faltam {{$inventario->tempoFinalizacao()}} dias para encerrar
        </span>
        @else
        <p>Inicio: {{$inventario->data_inicio->format('d/m/Y')}} </p>
        <p>Fim: {{$inventario->data_fim->format('d/m/Y')}}</p>
        @endif

    </div>
    
    @if($inventario->ativo == 1)
    <div class="icon"><i class="fas fa-spinner"></i></div>
    @else
    <div class="icon"><i class="far fa-calendar-check"></i></div>
    @endif
    <a href="{{route('inventarios.show', $inventario)}}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
</div>





