<table class="table no-margin">
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>

            @yield('responsabilidades_header')
            
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

                @yield('responsabilidades_body')

                <td style="width: 70px">
                        <a href="{{route('inventario.membros.show', [$membro->inventario, $membro])}}" title="Click para ver.">
                            <i class="fa fa-eye text-info"></i></a>&nbsp;&nbsp;
                        @if($membro->inventario->isPreColeta() || $membro->inventario->isColetaAtiva())
                        <a href="{{route('inventario.membro.edit', [$membro->inventario, $membro])}}" title="Click para editar.">
                            <i class="fa fa-edit text-warning"></i></a>&nbsp;&nbsp;
                        @endif
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