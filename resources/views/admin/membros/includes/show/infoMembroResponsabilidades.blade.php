<div class="row">
        <div class="col-md-7">
            @if($inventario->isAtivo())
            <div class="box box-info">    
            @else
            <div class="box box-success">
            @endif
        <div class="box-header">
          <h3 class="box-title">Responsabilidades</h3>
          <a href="{{route('inventario.membro.edit', [$membro->inventario, $membro])}}" title="Editar">
                <i class="pull-right fa fa-edit text-warning"></i>
        </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tbody><tr>
              <th style="width: 10px">Check</th>
              <th>Sigla</th>
              <th>Lotação</th>
              <th style="width: 40px">Coletas</th>
              <th>Ações</th>
            </tr>
            @foreach ($membro->responsabilidades()->paginate(5) as $responsabilidade)
                <tr>
                    <td>
                            <label>
                                <input type="checkbox">
                            </label>
                    </td>
                    <td>{{ $responsabilidade->lotacao()->lota_sigla_lotacao }}</td>
                    <td>{{ $responsabilidade->lotacao()->lota_dsc_lotacao }}</td>
                    <td>
                        <span class="badge bg-light-blue">50/100</span>
                    </td>
                    <td>
                        <a href="#" title="Detalhes">
                                <i class="fa fa-eye text-info"></i>
                        </a>
                        <a href="#" title="Coletas">
                            <i class="fas fa-archive"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

          </tbody></table>
        </div>

        <div class="box-header">
            <div class="col-md">
                    <div class="pull-right">{{$membro->responsabilidades()->paginate(5)->links()}}</div>
            </div>
      
        </div>

        <!-- /.box-body -->
      </div>
    </div>


<div class="col-md-5">  
        <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title">Detalhes</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
                Nivel de tombos encontrados
                <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                </div>
                Lotações Filhas
                <div class="box-body">
                        <ul>
                          <li>Lorem ipsum dolor sit amet</li>
                          <li>Consectetur adipiscing elit</li>
                          <li>Integer molestie lorem at massa</li>
                          <li>Facilisis in pretium nisl aliquet</li>
                          <li>Nulla volutpat aliquam velit
                        </ul>
                      </div>
            </div>
            <!-- /.box-body -->
        </div>
</div>

</div>
