
@push('css')
<style>
        td {
            width: 50%;
        }
        input{
            width: 100%;
        }
</style>
@endpush



@if($inventario->ativo == 1)
<div class="box box-info">
        
@else
<div class="box box-success" style='height: 50em'>
@endif
    <div class="box-header with-border">
        <h3 class="box-title" style="display: inline-block">Informações do Inventário</h3>

        @if($inventario->ativo == 1)
        <span class="label label-info pull-right">Em progresso</span>
        
        @else
        <span class="label label-success pull-right">Finalizado</span>
        @endif
        
    </div>
    <form method="POST" action="{{route('inventarios.update', $inventario)}}">

        {{csrf_field()}}
        {{method_field('PUT')}}
        
        <div class="box-body">
            <table class="table no-margin">
                <tbody>
                    <tr>
                        <td ><strong>Ano de Realização </strong></td>
                        <td>{{$inventario->ano}}</td>
                        <td style="display:none"><input  type="number" name="ano" value="{{$inventario->ano}}"></td>
                    </tr>

                    <tr>
                        <td><strong>Localidade </strong><i class="fas fa-map-marker-alt"></td>
                        <td >{{$inventario->localidade}}</td>
                        <td style="display:none"><input type="text" name="localidade" value="{{$inventario->localidade}}"></td>
                    </tr>

                    <tr>
                        <td><label>Portaria </label></td>
                        <td class='toggle'>{{$inventario->portaria}}</td>
                        <td class='toggle' style="display:none"><input type="text" name="portaria" value="{{$inventario->portaria}}"></td>
                    </tr>

                    <tr>
                        <td><strong>Data de Inicio </strong><i class="far fa-calendar-alt"></td>
                        <td class='toggle'>{{$inventario->data_inicio->format('d/M/Y')}}</td>
                        <td class='toggle' style="display:none"><input type="date" name="data_inicio" value="{{$inventario->data_inicio->format('Y-m-d')}}"></td>
                    </tr>

                    <tr>
                        <td><strong>Data de Finalização </strong><i class="far fa-calendar-alt"></td>
                        <td class='toggle'>{{$inventario->data_fim->format('d/M/Y')}}</td>
                        <td class='toggle' style="display:none"><input type="date" name="data_fim" value="{{$inventario->data_fim->format('Y-m-d')}}"></td>
                    </tr>

                    <tr>
                        <td><strong>Criado por </strong><i class="fas fa-user"></td>
                        <td>{{$criado_por}}</td>
                        <td style="display:none"><input type="text" name="criado_por" value="{{$inventario->criado_por}}"></td>
                    </tr>
                    
                </tbody>
            </table>
            <p class='toggle'><strong>Observações:  </strong>{{$inventario->obs}}</p>
            <div class="form-group toggle" style="display:none">
                <label for="obs">Observações:</label>
                <textarea class='form-control form-control-sm'  name="obs" rows="5">{{$inventario->obs}}</textarea>  
            </div>
        </div>
    
        <div class="box-footer">
            <a href="#" class="btn btn-sm btn-warning pull-right toggle"><i class="fas fa-edit"></i> Editar Informações</a>
            <a id="#" href="#" class="btn btn-sm btn-danger pull-right toggle" style="display:none"><i class="fas fa-trash-alt"></i> Excluir Inventário</a>
            <button type=submit id="#" href="#" class="btn btn-sm btn-success pull-left toggle" style="display:none"><i class="fas fa-save"></i> Salvar</button>
            <a href="#" class="btn btn-sm btn-default pull-left toggle" style="display:none"> Cancelar</a>
        </div>
    </form>
</div>

@push('js')
<script>
    $(document).ready(function () {
        $('.btn-warning, .btn-default').click(function(){
            $('.toggle').toggle();
        });
    });
</script>
@endpush