@if($membro->inventario->isAtivo())
<div class="box box-info">
@else
<div class="box box-sucesse">
@endif
        <div class="box-header">
                <h3 class="box-title" style="display: inline-block">Informações do Membro</h3>
        
            @if($membro->inventario->isPreColeta() || $membro->inventario->isColetaAtiva())
            <a type="button" class="pull-right btn btn-default" href="{{route('inventario.membros.show', [$membro->inventario, $membro])}}" title="Clique para ver">
                <i class="fas fa-eye"></i> Ativades do membro</a>&nbsp;&nbsp;
            @endif
        
        </div>
        <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                            <div class="form-group">
                                    <label for="nu_matr_servidor">Matrícula</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <input type="text"  class='form-control' name="nu_matr_servidor" disabled value="{{$membro->nu_matr_servidor}}"></td>
                                    </div>    
                            </div>
                    </div>
                    <div class="col-md-10">
                            <div class="form-group">
                                    <label for="nu_matr_servidor">Nome</label>
                                    <input type="text" class='form-control' disabled value="{{$membro->servPessoal()->no_servidor}}"></td>  
                            </div>
                    </div>  
                </div>
        </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        
        $("#nu_matr_servidor").select2({
            allowClear: true,
            placeholder: {
                id: '-1',
                text: "Selecione o Servidor"
            }
        });
        
        $("#responsabilidades").select2(
            {
            placeholder: {
                id: '-1',
                text: "Selecione as Lotações"
            }
        }
        );
    });
</script>
@endpush