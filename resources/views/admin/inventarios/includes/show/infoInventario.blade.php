
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
    <div class="box-body">
        <table class="table no-margin">
            <tbody>
                <tr>
                    <td><strong>Ano de Realização </strong></td>
                    <td>{{$inventario->ano}}</td>
                </tr>
                <tr>
                    <td><strong>Localidade </strong></td>
                    <td>{{$inventario->localidade}}</td>
                </tr>
                <tr>
                    <td><strong>Portaria </strong></td>
                    <td>{{$inventario->portaria}}</td>
                </tr>
                <tr>
                    <td><strong>Data de Inicio </strong></td>
                    <td>{{$inventario->data_inicio->format('d/M/Y')}}</td>
                </tr>
                <tr>
                    <td><strong>Data para Finalização </strong></td>
                    <td>{{$inventario->data_fim->format('d/M/Y')}}</td>
                </tr>
                <tr>
                    <td><strong>Criado por </strong></td>
                    <td>{{$inventario->criado_por}}</td>
                </tr>
                
            </tbody>

        </table> 
        <p><strong>Observações:  </strong></td>{{$inventario->obs}}</p>    
    </div>
</div>