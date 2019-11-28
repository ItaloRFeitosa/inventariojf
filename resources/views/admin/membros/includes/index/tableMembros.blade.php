<table class="table no-margin">
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($membros as $membro)
            <tr>
                <td style="width: 5%">{{$membro->nu_matr_servidor}}</td>
                @if (null == $membro->servPessoal())

                <td class='form-group has-warning' style="border-color: #f39c12"> Não Encontrado&nbsp;<span class="label label-warning">Verificar</span></td>  
         
                @else
                    
                <td>{{$membro->servPessoal()->no_servidor}}&nbsp;
                    @if ($membro->flag_adm == 1)
                    <span class="label label-success">ADM</span>
                    @endif
                </td>

                @endif
                <td style="width: 70px">
                        <a href="{{route('inventario.membros.show', [$membro->inventario, $membro])}}" title="Click para ver."><i
                            class="fa fa-eye text-info"></i></a>&nbsp;&nbsp;
                        <a href='#' title="Click para editar."><i
                            class="fa fa-edit text-warning"></i></a>&nbsp;&nbsp;
                </td>
            </tr>
        @empty
            <tr align="center">
                <td style="width: 5%"></td>
                <td style="width: 80%">Ainda sem Membros</td>
                <td></td>
            </tr>
        @endforelse

        
    </tbody>
</table>