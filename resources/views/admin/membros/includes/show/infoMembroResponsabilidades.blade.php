<div class="row">
        <div class="col-md-12">
            @if($inventario->isAtivo())
            <div class="box box-info">    
            @else
            <div class="box box-success">
            @endif
        <div class="box-header">
          <h3 class="box-title">Responsabilidades</h3>

          <div class="box-tools">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">«</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table">
            <tbody><tr>
              <th style="width: 10px">Check</th>
              <th>Sigla</th>
              <th>Lotação</th>
              <th style="width: 40px">Coletas</th>
              <th style="width: 40px">Ações</th>
            </tr>
            @foreach ($responsabilidades as $responsabilidade)
                <tr>
                    <td>
                            <label>
                                <input type="checkbox">
                            </label>
                    </td>
                    <td>{{ $responsabilidade->lota_sigla_lotacao }}</td>
                    <td>{{ $responsabilidade->lota_dsc_lotacao }}</td>
                    <td>
                        <span class="badge bg-red">55%</span>
                    </td>
                    <td>
                        <a href="#" title="Ver detalhes">
                            <i class="fa fa-eye text-info"></i>
                        </a>
                        <a href="#" title="Ver detalhes">
                                <i class="fa fa-eye text-info"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

          </tbody></table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
</div>
