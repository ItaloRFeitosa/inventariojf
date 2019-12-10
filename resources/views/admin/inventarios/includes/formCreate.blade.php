<div class="box box-info">
    <div class="box-body">
        <form method="POST" action="{{route('inventarios.store')}}">
            {{csrf_field()}}
            <div class="row">
                <tb>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="ex.: Inventario JUS MA 2016.2" 
                        value="{{ old('name') }}" autofocus>
                    </div>
                </div>
                <!--INPUT NOME INVENTARIO -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ano">Ano</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <input name="ano" type="number" class="form-control" id="ano" min="2000" max="9999" 
                            value="{{ $valoresPadrao['ano'] or old('ano') }}" autofocus>
                        </div>
                    </div>
                </div>
                </tb>
                <!--INPUT ANO INVENTARIO -->
                <tb>
                <div class="col-md-8">
                    <div class="form-group">
                            <label for="localidade">Localidade</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fas fa-map-marker"></i>
                                </div>
                                    <select  name='localidade' id="localidade" class="form-control">
                                        @foreach ($localidades as $localidade)
                                            @if ($localidade->lota_cod_lotacao== $valoresPadrao['localidade']  )
                                                <option selected value="{{ $localidade->lota_cod_lotacao }}">
                                                        {{ $localidade->lota_sigla_lotacao }} - 
                                                        {{ $localidade->lota_dsc_lotacao }}
                                                </option>
                                            @else
                                                <option value="{{ $localidade->lota_cod_lotacao }}" > 
                                                    {{ $localidade->lota_sigla_lotacao }} - 
                                                    {{ $localidade->lota_dsc_lotacao }}
                                                </option>
                                            @endif  
                                        @endforeach
                                    </select>
                            </div>    
                    </div>
                </div>
                <!--INPUT LOCALIDADE INVENTARIO -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="portaria">Portaria</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fas fa-file-contract"></i>
                            </div>
                            <input name="portaria" type="text" class="form-control" id="portaria" placeholder="ex.: SJMA-SECAD - 8046227" 
                            value="{{ old('portaria') }}" autofocus>
                        </div>
                    </div>
                </div>
                </tb>
                <!--INPUT PORTARIA INVENTARIO -->
                <tb>
                <div class="col-md-6">
                    <label for="data_inicio">Data de Inicio</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <input name="data_inicio" type="date" class="form-control" id="data_inicio"  
                        value="{{ $valoresPadrao['data'] or old('data_inicio') }}" autofocus>
                    </div>
                </div>
                <!--INPUT DATA INICIO INVENTARIO -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="duracao">Duração (em dias)</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fas fa-calendar-week"></i>
                            </div>
                            <input name="duracao" type="number" class="form-control" id="duracao" min="1" max="365" 
                            value="{{ $valoresPadrao['duracao'] or old('duracao') }}" autofocus>
                        </div>
                    </div>
                </div>
                </tb>
                <!--INPUT PERIODO  DE DURAÇÃO INVENTARIO -->
                <tb>
                <div class="col-md-12">
                    <div class="form-group">
                            <label for="nu_matr_servidor">Presidente da Comissão</label>
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
                </tb>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="obs">Observação</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fas fa-align-left"></i>
                            </div>
                            <textarea name="obs" id="obs" class="form-control" rows="3" placeholder="Insira uma observação se nescessario" 
                            value="{{ old('obs') }}" ></textarea>
                        </div>
                    </div>
                </div>
                <!--INPUT OBS INVENTARIO -->

                <div class="col-md-4">
                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                </div>

                <div class="col-md-4">
                    <button class="btn btn-warning btn-block" type="reset"><i class="fa fa-times" aria-hidden="true"></i> Limpar</button>
                </div>

                <div class="col-md-4">
                    <a href="{{route('inventarios.index')}}" class="btn btn-default btn-block"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Cancelar</a>
                </div>
                <!--BOTÕES-->

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
        
    });
    
</script>
@endpush