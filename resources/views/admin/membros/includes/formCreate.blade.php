<div class="box box-success">
        <div class="box-header">
                <h3 class="box-title" style="display: inline-block">Adicionar Membro</h3>
        </div>
        <div class="box-body">
            <form method="POST" action="{{route('membros.store')}}">
                {{csrf_field()}}
                <div class="row">
                    <input type="hidden" name='id_inventario' value={{$inventario->id}}>
                    <div class="col-md-10">
                            <div class="form-group">
                                    <label for="nu_matr_servidor">Matrícula - Nome</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                            <select  name='nu_matr_servidor' id="nu_matr_servidor" class="form-control">
                                                @foreach ($servidores as $servidor)
                                                        <option value="{{ $servidor->nu_matr_servidor }}">
                                                                {{ $servidor->nu_matr_servidor }} - 
                                                                {{ $servidor->no_servidor }}
                                                        </option>
                                                      
                                                @endforeach
                                            </select>
                                    </div>    
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
                                                        <option value=1 >Sim</option>
                                                        <option value=0 selected>Não</option>
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
                                                   @foreach ($lotacoes as $chave => $lotacao)
                                                   
                                                       <optgroup label="{{$chave}}">
                                                   
                                                    @foreach ($lotacao as $filho)
                                                            <option value="{{ $filho->lota_cod_lotacao }}">
                                                                    {{ $filho->lota_cod_lotacao }} -
                                                                    {{ $filho->hierarquia(1) }} - 
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

                                <div class="col-md-8"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning btn-block" type="reset"><i class="fa fa-times" aria-hidden="true"></i> Limpar</button>
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