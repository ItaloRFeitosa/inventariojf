<div class="box box-success">
    <div class="box-body">
        <form method="POST" action="{{route('inventarios.create')}}">
            {{csrf_field()}}
            <div class="row">
                <tb>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="inventario">Nome</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="ex.: Inventario JUS MA 2016.2" value="{{old('invenatrio')}}" autofocus>
                    </div>
                </div>
                <!--INPUT NOME INVENTARIO -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inventario">Ano</label>
                        <input name="ano" type="number" class="form-control" id="ano" placeholder="2015" min="2000" max="9999" value="{{old('invenatrio')}}" autofocus>
                    </div>
                </div>
                </tb>
                <!--INPUT ANO INVENTARIO -->
                <tb>
                <div class="col-md-8">
                    <div class="form-group">
                            <label>Localidade</label>
                            <select class="js-example-basic-multiple form-control" name="states[]">
                                    @foreach ($localidades as $localidade)
                                        <option value=" {{ $localidade->lota_cod_lotacao }} "> {{ $localidade->lota_sigla_lotacao }} - {{ $localidade->lota_dsc_lotacao }}</option>  
                                    @endforeach
                            </select>
                    </div>
                </div>
                <!--INPUT LOCALIDADE INVENTARIO -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inventario">Portaria</label>
                        <input name="portaria" type="text" class="form-control" id="portaria" placeholder="ex.: SJMA-SECAD - 8046227" value="{{old('invenatrio')}}" autofocus>
                    </div>
                </div>
                </tb>
                <!--INPUT PORTARIA INVENTARIO -->
                <tb>
                <div class="col-md-6">
                    <label for="inventario">Data de Inicio</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input name="data_inicio" type="date" class="form-control" id="data_inicio"  value="{{old('invenatrio')}}" autofocus>
                    </div>
                </div>
                <!--INPUT DATA INICIO INVENTARIO -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inventario">Periodo de duração</label>
                        <input name="duracao" type="number" class="form-control" id="duracao" placeholder="60 dias corridos" min="1" max="365" value="{{old('invenatrio')}}" autofocus>
                    </div>
                </div>
                </tb>
                <!--INPUT PERIODO  DE DURAÇÃO INVENTARIO -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inventario">Observação</label>
                        <textarea name="obs" id="obs" class="form-control" rows="3" placeholder="Insira uma observação se nescessario" value="{{old('invenatrio')}}" ></textarea>
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