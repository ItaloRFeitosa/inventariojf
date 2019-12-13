<div class="row">
        <div class="col-md-12">
            @if($membro->inventario->isAtivo())
            <div class="box box-info">
            @else
            <div class="box box-success">
            @endif
        <div class="box-header">
          <h3 class="box-title">Responsabilidades</h3>

        
        </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="POST" id = "addResponsabilidade" action="{{route('responsabilidades.store')}}">
                        {{csrf_field()}}
                        <input type="hidden" name='id_membro' value={{$membro->id}}>
                        <div class="form-group">
                                <label for="responsabilidades"></label>
                                <div class="input-group margin">
                                    
                                    <div class="input-group-addon">
                                        <i class="fa fa-fw fa-sitemap"></i>
                                    </div>

                                    <select name='responsabilidades[]' id="responsabilidades" class="form-control" multiple='multiple'>
                                        
                                        @foreach ($lotacoes as $chave => $lotacao)
                                            <optgroup label="{{$chave}}">
                                        
                                        @foreach ($lotacao as $filho)
                                        
                                                <option value="{{ $filho->lota_cod_lotacao }}">
                                                        {{ $filho->lota_cod_lotacao }} -
                                                        {{ $filho->lota_sigla_lotacao }} - 
                                                        {{ $filho->lota_dsc_lotacao }}
                                                </option>
                                                
                                        @endforeach
                                            </optgroup>
                                        @endforeach

                                    </select>
                                        
                                    <span class="input-group-btn">
                                        <button class="btn btn-success " form='addResponsabilidade' type="submit">
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                        </button> 
                                    </span> 

                              </div>           
                        </div>
                    </form>
                </div>
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