
<div class="box box-success">
        <div class="box-header">
                <h3 class="box-title" style="display: inline-block">Editar Membro</h3>
                
                        <button class="btn btn-danger pull-right" type=""><i class="fa fa-times" aria-hidden="true"></i> Excluir</button>

        </div>
        <div class="box-body">
            <form method="POST" action="{{route('membros.update', $membro)}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="row">
                    <div class="col-md-2">
                            <div class="form-group">
                                    <label for="nu_matr_servidor">Matrícula</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <input type="text"  class='form-control' name="nu_matr_servidor" disabled value="{{$membro->nu_matr_servidor}}"></td>
                                    </div>    
                            </div>
                    </div>

                    <div class="col-md-8">
                            <div class="form-group">
                                    <label for="nu_matr_servidor">Nome</label>
                                    <input type="text" class='form-control' disabled value="{{$membro->servPessoal()->no_servidor}}"></td>  
                            </div>
                    </div>

                    <div class="col-md-2">
                            <div class="form-group">
                                    <label for="flag_adm">Privilégios:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fas fa-users-cog"></i>
                                        </div>
                                            <select  name='flag_adm' id="flag_adm" class="form-control">
                                                        @if ($membro->flag_adm)
                                                            <option value=1 selected>Sim</option>
                                                            <option value=0 >Não</option>
                                                        @else
                                                            <option value=1 >Sim</option>
                                                            <option value=0 selected>Não</option>
                                                        @endif
                                                        
                                            </select>
                                    </div>    
                            </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                        <label for="responsabilidades">Lotações a ser responsável:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-map-marker"></i>
                                            </div>
                                                <select  name='responsabilidades[]' id="responsabilidades" class="form-control" multiple='multiple'>
                                                   @foreach ($membro->responsabilidades as $resp )
                                                    <option selected value="{{$resp->cod_lotacao}}">
                                                            {{ $resp->lotacao()->lota_cod_lotacao }} -
                                                            {{ $resp->lotacao()->lota_sigla_lotacao }} - 
                                                            {{ $resp->lotacao()->lota_dsc_lotacao }}
                                                    </option>
                                                   @endforeach
                                                   
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
                                        </div>    
                                </div>
                            </div>
                    </div>
                    <div class="row">

                                
                                <div class="col-md-8">
                                    
                                </div>
                                <div class="col-md-2">
                                <a href='{{route('inventario.membros.index', $membro->inventario)}}' class="btn btn-default btn-block" type="reset"><i class="fas fa-arrow-circle-left"></i> Cancelar</a>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                                </div>
                
                
    
                    </div>
                    
            </form>
        </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        
        $("#nu_matr_servidor").select2({
            allowClear: true,
            placeholder: {
                id: '-1',
                text: "Selecione o Servidor"
            }
        });
        
        $("#responsabilidades").select2(
            {
            placeholder: {
                id: '-1',
                text: "Selecione as Lotações"
            }
        }
        );
    });
    
</script>
@endpush