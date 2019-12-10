<div class="row">
        <div class="col-md-12">
            @if($membro->inventario->isAtivo())
            <div class="box box-info">
            @else
            <div class="box box-success">
            @endif
        <div class="box-header">
          <h3 class="box-title">Responsabilidades</h3>

          

        </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tbody><tr>
              <th style="width: 18%">Relativos</th>
              <th>Lotação</th>
              <th style="width: 100px">Coletas</th>
              <th style="width: 120px">Ações</th>
            </tr>
            @foreach ($membro->responsabilidades as $responsabilidade)
                <tr>
                    <td>{{$responsabilidade->lotacao()->hierarquia()}}</td>
                    <td>{{ $responsabilidade->lotacao()->lota_sigla_lotacao }} - {{ $responsabilidade->lotacao()->lota_dsc_lotacao }}</td>
                    <td>
                        <span class="badge bg-light-blue">50/100</span>
                    </td>
                    <td>
                        <form id = "formDelete" class="delete" method="POST" action="{{route('responsabilidades.destroy', $responsabilidade)}}">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                        </form>

                        <div class="pull-right btn-group">
                        
                            <a type="button" class="btn btn-default" href="#" title="Visualizar Tombos">
                                <i class="fas fa-eye"></i></a>&nbsp;&nbsp;

                            @if($membro->inventario->isPreColeta() || $membro->inventario->isColetaAtiva())
                            <button form='formDelete' class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja deletar esta Responsabilidade?')" title="Excluir responsabilidade">
                                <i class="far fa-trash-alt" aria-hidden="true" ></i></button>
                            @endif
    
                        </div>

                    </td>
                </tr>
            @endforeach

          </tbody></table>
        </div>

        <!-- /.box-body -->
      </div>
    </div>

