<table class="table no-margin">
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>         
<<<<<<< HEAD
            <th style="width: 50%">Lotação Responsavel</th>
            <th>Opções</th>
=======
            <th style="width: 60%">Lotação Responsável</th>
            <th>Ações</th>
>>>>>>> a188a02e538ee36ec3aa956b1512ac2a0ff395d4
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
            
            <td>
            @foreach ($membro->responsabilidades as $resp)
            <span class="label label-primary">{{$resp->lotacao()->hierarquia(2)}}</span>&nbsp;&nbsp;
                
            @endforeach
            </td>
            
            <td style="width: 150px">

                <div class="btn-group">
                    
                    <a type="button" class="btn btn-default" href="{{route('inventario.membros.show', [$membro->inventario, $membro])}}" title="Atividades do membro">
                        <i class="fas fa-eye"></i></a>&nbsp;&nbsp;

                    @if($membro->inventario->isPreColeta() || $membro->inventario->isColetaAtiva())
                    <a type="button" class="btn btn-default" href="{{route('inventario.membro.edit', [$membro->inventario, $membro])}}" title="Editar responsabilidades e privilegios">
                        <i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                    <a form='formDelete' class="btn btn-danger" type=submit onclick="return confirm('Tem certeza que deseja deletar este Membro?')" title="Excluir membro">
                        <i class="far fa-trash-alt" aria-hidden="true" ></i></a>
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