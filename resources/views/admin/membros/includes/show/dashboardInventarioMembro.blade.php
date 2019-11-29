<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          @if($inventario->isAtivo())
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fas fa-calendar-week"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PROGRESSO</span>
              
              @if($inventario->isPreColeta())
                <span class="info-box-number"> 0 Dias </span>
              @else
                <span class="info-box-number">{{( $inventario->duracaoInventario() - $inventario->tempoFinalizacao() )}} Dias</span>
              @endif

              <div class="progress">
                <div class="progress-bar" style="width: {{ $inventario->progresso() }}%"></div>
              </div>

                <span class="progress-description">
                  @if($inventario->isColetaAtiva())
                    Faltam {{$inventario->tempoFinalizacao()}} dias
                  @elseif($inventario->isPreColeta())
                    Inicia em {{$inventario->data_inicio->format('d/m/Y')}}
                  @elseif($inventario->isPosColeta())
                    Terminou {{$inventario->data_fim->format('d/m/Y')}}
                  @endif
                </span>

            </div>
          </div>
          @elseif(!$inventario->isAtivo())
          <div class="info-box bg-aqua">
              <span class="info-box-icon"><i class="fas fa-calendar-week"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">PROGRESSO</span>
                  <span class="info-box-number">{{( $inventario->duracaoInventario() - $inventario->tempoFinalizacao() )}} Dias</span>
              

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>

                  <span class="progress-description">
                      Inventario Finalizado
                  </span>

              </div>
            </div>
            @endif
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fas fa-barcode"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Coletas</span>
              <span class="info-box-number">41 Tombos</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Inventariado
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fas fa-search"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Achados</span>
              <span class="info-box-number">10 Tombos</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    100% encontrados
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fas fa-times"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Não Encontrados</span>
              <span class="info-box-number">10 Tombos</span>

              <div class="progress">
                <div class="progress-bar" style="width: 12%"></div>
              </div>
                  <span class="progress-description">
                    12% do seu total
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>