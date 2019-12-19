@push('css')
<style>
    .cell-overflow{
        overflow: hidden; white-space: nowrap; text-overflow: ellipsis;
    }
    .cell-overflow:hover{
        overflow: visible; white-space: normal;
    }
</style>
@endpush


<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title"><strong>Setor:</strong> {{$setor->co_setor}} - {{$setor->no_setor}}</h3>
        <form method="POST" id='perpage' action="{{route('coletas.changePagination')}}">
            {{csrf_field()}}
        
        <select class='form-control pull-right' style="width: 20%" name="perPage" id="lista">
            <option  value="15">15 tombos por página</option>
            <option selected value="50">50 tombos por página</option>
            <option value="100">100 tombos por página</option>
            <option value="500">500 tombos por página</option>
            <option value="1000">1000 tombos por página</option>
        </select> 
        </form>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped table-hover" style="table-layout: fixed">
            <tr>
                <th style="width: 7%">TOMBO</th>
                <th >DESCRIÇÃO</th>
                <th style="width: 10%">Encontrado <a href="#" disabled title="Por Padrão todos os tombos vem marcados encontrados, por favor, desmarcar os que não foram encontrados">
                    <i class="fas fa-question"></i></a> </th>
                <th style="width: 10%">Estado</th>
                <th style="width: 20%">Obs:</th>
            </tr>
            @foreach ($setor->tombos(50) as $tombo)
            <tr>
                
                <td>T {{$tombo->nu_tombo}}</td><input type="hidden" name='nu_tombo' value="{{$tombo->nu_tombo}}">
                <td class="cell-overflow"> <small>{{$tombo->descricaoMaterial()}}</small></td>
                <td align="center"><input type="checkbox" name="encontrado" checked></td>
                <td align="center">
                    <select name="estado_fisico" id="">
                        <option value="0">OK</option>
                        <option value="1">Avariado</option>
                        <option value="2">Não Sei</option>
                    </select>  
                </td>
                <td ><input style="width: 100%" type="text" name='obs' value=""></td>
                
                
            </tr>
            @endforeach
        </table>
    </div>
    <div class="box-footer">
        <div class="col-md-2"><p>Total de {{$setor->tombos(50)->total()}} neste Setor</p></div>
        <div class="pull-right">{{$setor->tombos(50)->links()}}</div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        // $("#lista").on('click', function(){
        //     $('#perpage').submit();
        // });
    });
</script>
@endpush