<div class="box box-success">
    <div class="box-body">
        <form method="POST" action="{{route('inventario.create')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="phone">NÚMERO</label>
                        <input name="phone" type="text" class="form-control" id="phone" placeholder="ex.: 32145665" value="{{old('phone')}}" autofocus>
                    </div>
                </div>
                <!--INPUT IMPRESSORA -->
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="category">CATEGORIA</label>
                        <input id="category_id" name="category_id" type="text" class="form-control" list="categories" autocomplete="off" value="{{old('category_id')}}" />
                        <datalist id="categories">
                            @forelse($categories as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                            @empty
                            <option value="">----------</option>
                            @endforelse
                        </datalist>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sector_id">SETOR</label>
                        <input id="sector_id" name="sector_id" type="text" class="form-control" list="sectors" autocomplete="off" value="{{old('sector_id')}}" />
                        <datalist id="sectors">
                            @forelse($sectors as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @empty
                            <option value="">----------</option>
                            @endforelse
                        </datalist>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_id">USUÁRIO</label>
                        <input id="user_id" name="user_id" type="text" class="form-control" list="users" autocomplete="off" value="{{old('sector_id')}}" />
                        <datalist id="users">
                            @forelse($users as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                            @empty
                            <option value="">----------</option>
                            @endforelse
                        </datalist>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                </div>

                <div class="col-md-4">
                    <button class="btn btn-warning btn-block" type="reset"><i class="fa fa-times" aria-hidden="true"></i> Limpar</button>
                </div>

                <div class="col-md-4">
                    {{--<a href="{{url('printers')}}" class="btn btn-default btn-block"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar p/ Impressoras</a>--}}
                    <a href="{{url('admin/phones')}}" class="btn btn-default btn-block"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Voltar</a>
                </div>
            </div>

        </form>

    </div>
</div>