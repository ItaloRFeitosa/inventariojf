@if($inventario->isColetaAtiva())
<div class="small-box bg-aqua">
@elseif($inventario->isPreColeta())
<div class="small-box bg-aqua">
@elseif($inventario->isPosColeta())
<div class="small-box bg-yellow">
@else
<div class="small-box bg-green">
@endif

    <div class="inner">
        <h3>{{$inventario->ano}}</h3>
        <h4>{{$inventario->name}}</h4>
        <p><i class="fas fa-map-marker"></i> {{$inventario->localidade()->lota_sigla_lotacao}}</p>
        
        @if($inventario->isColetaAtiva())
        <div class="progress progress-xxs active">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" 
                style="width: {{ $inventario->progresso() }}%">
                </div>
        </div>
        <span class="progress-description">
            Faltam {{$inventario->tempoFinalizacao()}} dias para encerrar
        </span>
        
        @elseif($inventario->isPreColeta())
        <p><i class="fas fa-calendar-week"></i>
            Inicia em {{$inventario->data_inicio->format('d/m/Y')}}</p>
        
        @elseif($inventario->isPosColeta())
        <p><i class="fas fa-calendar-week"></i>
            Terminou em {{$inventario->data_fim->format('d/m/Y')}}</p>
        
        @else
        <p><i class="fas fa-calendar-week"></i>
            {{$inventario->data_inicio->format('d/m/Y')}} -
            {{$inventario->data_fim->format('d/m/Y')}}</p>
        @endif

    </div>
    
    @if($inventario->isColetaAtiva())
    <div class="icon"><i class="fas fa-hourglass-half"></i></div>
    @elseif($inventario->isPreColeta())
    <div class="icon"><i class="far fa-hourglass"></i></div>
    @elseif($inventario->isPosColeta())
    <div class="icon"><i class="fas fa-hourglass"></i></div>
    @else
    <div class="icon"><i class="fas fa-check"></i></div>
    @endif
    <a href="{{route('inventarios.show', $inventario)}}" class="small-box-footer">Mais Informações <i class="fa fa-arrow-circle-right"></i></a>
</div>





