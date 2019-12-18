<div class="box box-info collapsed-box">
    <div class="box-header">
            <h3 class="box-title">Setores da Lotação</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                </div>
    </div>
    <div class="box-body" style="display: none;">

            @foreach ($responsabilidade->lotacao()->setores() as $key => $setor)
            <div class="col-md-3">
            <a class="btn btn-info btn-sm btn-block btn-flat" style='margin-bottom: 5px' href="{{route('coletas.showTombos', [$responsabilidade, $key])}}" title="ver Tombos"><small>{{$setor->co_setor}} - {{ $setor->no_setor}}</small></a>
            </div>
            @endforeach
    </div>
</div>