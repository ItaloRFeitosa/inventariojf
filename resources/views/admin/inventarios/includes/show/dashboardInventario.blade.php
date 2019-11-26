<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
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
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fas fa-barcode"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">COLETAS</span>
              <span class="info-box-number">329 Tombos</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% inventariado
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fas fa-map-marker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Locais</span>
              <span class="info-box-number">15 Lotações</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Faltam 10 lotações
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fas fa-search"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">NÃO ENCONTRADOS</span>
              <span class="info-box-number">50 Tombos</span>

              <div class="progress">
                <div class="progress-bar" style="width: 10%"></div>
              </div>
                  <span class="progress-description">
                    10% dos tombos
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>