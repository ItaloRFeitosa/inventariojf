<div class="box">
    <div class="box-header"></div>
    <div class="box-body">
        <table class="table">
            <tr>
                <th style="width: 10px">TOMBO</th>
                <th colspan="2">MATERIAL</th>
                <th>TERMO</th>
                <th style="width: 10%">DATA TERMO</th>
                <th colspan="2" style="width: 25%">RESPONSAVEL</th>
            </tr>
            @foreach ($responsabilidade->lotacao()->tombos() as $tombo)
                <tr>
                    <td>T {{$tombo->nu_tombo}}</td>
                    <td> {{$tombo->co_mat}}</td>
                    <td> <small>{{$tombo->descricaoMaterial()}}</small></td>
                    <td> {{$tombo->nu_termo}}/{{$tombo->an_termo}}</td>
                    <td> {{$tombo->termo()->dt_termo->format('m/d/Y')}}</td>
                    @if($tombo->termo()->nu_matr_resp_tombo != null)
                    <td> {{$tombo->termo()->nu_matr_resp_tombo}}</td>
                    <td> {{$tombo->termo()->servidorResponsavel()->no_servidor}}</td>
                    @else
                    <td> Sem registro </td>
                    @endif
                    
                </tr>
                @endforeach
        </table>
    </div>
    <div class="box-footer">
        <div class="pull-right">{{$responsabilidade->lotacao()->tombos()->links()}}</div>
    </div>
</div>