<div class="row">
        <div class="col-md-12">
            @if($inventario->isAtivo())
            <div class="box box-info">    
            @else
            <div class="box box-success">
            @endif
        <div class="box-header">
          <h3 class="box-title">Responsabilidades</h3>

          @if($membro->inventario->isPreColeta() || $membro->inventario->isColetaAtiva())
              <a type="button" class="pull-right btn btn-default" href="{{route('inventario.membro.edit', [$membro->inventario, $membro])}}" title="Clique para editar">
                  <i class="fas fa-edit"></i> Editar Responsabilidades</a>&nbsp;&nbsp;
          @endif

        </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tbody><tr>
              <th style="width: 18%">Relativos</th>
              <th>Lotação</th>
              <th>Diretor/Supervisor</th>
              <th style="width: 100px">Coletas</th>
              <th style="width: 50px">Tombos</th>
            </tr>
            @foreach ($membro->responsabilidades()->paginate(5) as $responsabilidade)
                <tr>
                    <td>{{$responsabilidade->lotacao()->hierarquia()}}</td>
                    <td>{{ $responsabilidade->lotacao()->lota_sigla_lotacao }} - {{ $responsabilidade->lotacao()->lota_dsc_lotacao }}</td>
                    <td></td>
                    <td>
                        <span class="badge bg-light-blue">50/100</span>
                    </td>
                    <td>

                        <div class="pull-right btn-group">
                        
                            <a type="button" class="btn btn-default" href="#" title="Visualizar Tombos">
                                <i class="fas fa-eye"></i></a>&nbsp;&nbsp;
    
                        </div>

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