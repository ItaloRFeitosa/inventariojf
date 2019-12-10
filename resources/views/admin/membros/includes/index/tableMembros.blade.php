<table class="table no-margin">
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>

            @yield('responsabilidades_header')
            
            <th class="text-center">Opções</th>
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

                <td style="width: 150px">

                        <div class="pull-right btn-group">
                        
                        <a type="button" class="btn btn-default" href="{{route('inventario.membros.show', [$membro->inventario, $membro])}}" title="Atividades do membro">
                            <i class="fas fa-eye"></i></a>&nbsp;&nbsp;

                        @if($membro->inventario->isPreColeta() || $membro->inventario->isColetaAtiva())
                        <a type="button" class="btn btn-default" href="{{route('inventario.membro.edit', [$membro->inventario, $membro])}}" title="Lotações responsaveis">
                            <i class="fa fa-fw fa-sitemap"></i></a>&nbsp;&nbsp;
                        @endif

                        </div>
    
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