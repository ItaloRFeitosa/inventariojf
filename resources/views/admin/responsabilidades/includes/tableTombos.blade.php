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
    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped table-hover" style="table-layout: fixed">
            <tr>
                <th style="width: 7%">TOMBO</th>
                <th style="width: 8%">MATERIAL</th>
                <th >DESCRIÇÃO</th>
                <th style="width: 7%">TERMO</th>
                <th   style="width: 8%">DATA TERMO</th>
                <th style="width: 25%">RESPONSÁVEL</th>
            </tr>
                @foreach ($setor->tombos() as $tombo)
                <tr>
                    <td>T {{$tombo->nu_tombo}}</td>
                    <td style="width: 10%"> {{$tombo->co_mat}}</td>
                    <td class="cell-overflow"> <small>{{$tombo->descricaoMaterial()}}</small></td>
                    <td > {{$tombo->nu_termo}}/{{$tombo->an_termo}}</td>
                    <td> {{$tombo->termo()->dt_termo->format('m/d/Y')}}</td>
                    @if($tombo->termo()->nu_matr_resp_tombo != null)
                    <td> {{$tombo->termo()->nu_matr_resp_tombo}} - {{$tombo->termo()->servidorResponsavel()->no_servidor}}</td>
                    @else
                    <td> Sem registro </td>
                    @endif
                    
                </tr>
                @endforeach
        </table>
    </div>
    <div class="box-footer">
        <div class="pull-right">{{$setor->tombos()->links()}}</div>
    </div>
</div>

{{-- @push('js')
    <script>
        $(document).ready(function () {
            $(".cell-overflow").hover(
                function(){ 
                    $('table').css('table-layout','auto');
                    $(this).css('whitespace','normal');
                    $(this).css('overflow','visible');
                }, function(){
                    $('table').css('table-layout','fixed');
                    $(this).css('whitespace','nowrap');
                    $(this).css('overflow','hidden');
                });
        });
    </script>
@endpush --}}