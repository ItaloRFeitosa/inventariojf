<div class="box box-success">
        <div class="box-header">
                <h3 class="box-title" style="display: inline-block">Adicionar Membros</h3>
        </div>
        <div class="box-body">
            <form method="POST" action="{{route('membros.store')}}">
                {{csrf_field()}}
                <div class="row">
                    <input type="hidden" name='id_inventario' value={{$inventario->id}}>
                    <div class="col-md-12">
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
                                                    @foreach ($lotacoes as $lotacao)
                                                            <option value="{{ $lotacao->lota_cod_lotacao }}">
                                                                    {{ $lotacao->lota_cod_lotacao }} -
                                                                    {{ $lotacao->lota_sigla_lotacao }} - 
                                                                    {{ $lotacao->lota_dsc_lotacao }}
                                                            </option>
                                                          
                                                    @endforeach
                                                </select>
                                        </div>    
                                </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-4">
                                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                                </div>
                
                                <div class="col-md-4">
                                    <button class="btn btn-warning btn-block" type="reset"><i class="fa fa-times" aria-hidden="true"></i> Limpar</button>
                                </div>
                
                                <div class="col-md-4">
                                    <a href="{{route('membros.store')}}" class="btn btn-default btn-block"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Cancelar</a>
                                </div>
                    </div>
                    
            </form>
        </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        
        $("#nu_matr_servidor").select2();
        
        $("#responsabilidades").select2();
    });
    
</script>
@endpush