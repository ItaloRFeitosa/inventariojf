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
              <a type="button" class="pull-right btn btn-default" href="{{route('inventario.membro.edit', [$membro->inventario, $membro])}}" title="Editar Responsabilidades">
                  <i class="fas fa-edit"></i></a>&nbsp;&nbsp;
          @endif

        </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tbody><tr>
              <th>Sigla</th>
              <th>Lotação</th>
              <th style="width: 100px">Coletas</th>
              <th style="width: 50px">Tombos</th>
            </tr>
            @foreach ($membro->responsabilidades()->paginate(5) as $responsabilidade)
                <tr>
                    <td>{{ $responsabilidade->lotacao()->lota_sigla_lotacao }}</td>
                    <td>{{ $responsabilidade->lotacao()->lota_dsc_lotacao }}</td>
                    <td>
                        <span class="badge bg-light-blue">50/100</span>
                    </td>
                    <td>

                        <div class="pull-right btn-group">
                        
                            <a type="button" class="btn btn-default" href="#" title="Visualizar Tombos">
                                <i class="fas fa-qrcode"></i></a>&nbsp;&nbsp;
    
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


{{-- <div class="col-md-5">  
        @if($inventario->isAtivo())
        <div class="box box-info">    
        @else
        <div class="box box-success">
        @endif
            <div class="box-header with-border">
            <h3 id="sigla_lotacao" class="box-title"><i class="fa fa-eye text-info"></i></h3>

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


@push('js')
<script>
  function showDetalhes($responsabilidade) {
    /* var sigla_lotacao = document.getElementById("btn-detalhe").value; */
    console.log($responsabilidade);
    document.getElementById("sigla_lotacao").innerHTML = $responsabilidade->lotacao()->lota_sigla_lotacao;
  }
</script>
@endpush
 --}}