<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fas fa-calendar-week"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PROGRESSO</span>
              <span class="info-box-number">{{( $inventario->duracaoInventario() - $inventario->tempoFinalizacao() )}} Dias</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{ $inventario->progresso() }}%"></div>
              </div>
                  <span class="progress-description">
                      Faltam {{$inventario->tempoFinalizacao()}} dias
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