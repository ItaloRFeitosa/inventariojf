
@push('css')
<style>
        td {
            vertical-align: center;
        }
        input{
            width: 50%;
        }
</style>
@endpush



@if($inventario->ativo == 1)
<div class="box box-info">
        
@else
<div class="box box-success">
@endif
    <div class="box-header with-border">
        <h3 class="box-title" style="display: inline-block">Informações do Inventário</h3>

        @if($inventario->ativo == 1)
        <span class="label label-info pull-right">Em progresso</span>
        
        @else
        <span class="label label-success pull-right">Finalizado</span>
        @endif
        
    </div>
    <form id = "formUpdate" method="POST" action="{{route('inventarios.update', $inventario)}}">

        {{csrf_field()}}
        {{method_field('PUT')}}
        
        <div class="box-body">
            <table class="table no-margin">
                <thead>
                    <tr>
                        <th style="width: 30%">

                        </th>

                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td ><strong>Ano de Realização </strong></td>
                        <td>{{$inventario->ano}}</td>
                    </tr>

                    <tr>
                        <td><strong>Localidade </strong><i class="fas fa-map-marker-alt"></td>
                        <td >{{ $inventario->lotacao()->lota_sigla_lotacao }} - {{ $inventario->lotacao()->lota_dsc_lotacao }}</td>
                    
                    </tr>

                    <tr>
                        <td><label>Portaria </label></td>
                        <td class='toggle'>{{$inventario->portaria}}</td>
                        <td class='toggle' style="display:none"><input type="text" name="portaria" value="{{$inventario->portaria}}"></td>
                    </tr>

                    <tr>
                        <td><strong>Data de Inicio </strong><i class="far fa-calendar-alt"></td>
                        <td class='toggle'>{{$inventario->data_inicio->format('d/m/Y')}}</td>
                        <td class='toggle' style="display:none"><input type="date" name="data_inicio" value="{{$inventario->data_inicio->format('Y-m-d')}}"></td>
                    </tr>
                    
                    <tr>
                        <td class='toggle'><strong>Duração</strong></td>
                        <td class='toggle' style="display:none"><strong>Estender Duração</strong></td>
                        <td class='toggle'>{{$inventario->duracaoInventario()}} dias </td>
                        <td class='toggle' style="display:none"><input  type="number" name="duracao" value=0></td>
                    </tr>
                    <tr>

                        <td><strong>Data de Finalização </strong><i class="far fa-calendar-alt"></td>
                        <td>{{$inventario->data_fim->format('d/m/Y')}}</td>
                    </tr>
                    

                    <tr>
                        <td><strong>Criado por </strong><i class="fas fa-user"></td>
                        <td>{{$inventario->criado_por_nome()}}</td>
                    </tr>
                    
                </tbody>
            </table>          
            <div class="form-group toggle">
                    <label for="obs">Observações:</label>
                    <textarea disabled class='form-control form-control-sm' name="obs" rows="3">{{$inventario->obs}}</textarea>  
                </div>
            <div class="form-group toggle" style="display:none">
                <label for="obs">Observações:</label>
                <textarea class='form-control form-control-sm' name="obs" rows="3">{{$inventario->obs}}</textarea>  
            </div>
        </div>
    </form>
    <form id = "formDelete" class="delete" method="POST" action="{{route('inventarios.destroy', $inventario)}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
    </form>
        <div class="box-footer">
            <a href="#" class="btn btn-sm btn-warning pull-right toggle"><i class="fas fa-edit"></i> Editar Informações</a>
            
            <button form = "formDelete" type=submit href="" class="btn btn-sm btn-danger pull-right toggle" onclick="return confirm('Tem certeza que deseja deletar este Inventário?')" style="display:none"><i class="fas fa-trash-alt"></i> Excluir Inventário</button>
            @if ($inventario->ativo == 1)      
            <button form = "formUpdate" type=submit href="" class="btn btn-sm btn-success pull-left toggle" style="display:none"><i class="fas fa-save"></i> Salvar</button>
            @endif
            
            <a href="#" class="btn btn-sm btn-default pull-left toggle" style="display:none"> Cancelar</a>
        </div>
    
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

