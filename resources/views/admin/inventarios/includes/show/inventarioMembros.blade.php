@if($inventario->isAtivo())
<div class="box box-info">
        
@else
<div class="box box-success">
@endif
    <div class="box-header with-border">
        <h3 class="box-title" style="display: inline-block">Membros da Comissão</h3>

        @if($inventario->isAtivo())
        <a href="#" id="add-membro" class="btn btn-success btn-sm pull-right"><i class="fas fa-plus"></i> Adicionar Membro</a>
        @endif
        
    </div>
    
    <div class="col-md-12">
    <div class="form-group" data-select2-id="13">
        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Busque para adicionar" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
            <option data-select2-id="17">Alabama</option>
            <option data-select2-id="18">Alaska</option>
            <option data-select2-id="19">California</option>
            <option data-select2-id="20">Delaware</option>
            <option data-select2-id="21">Tennessee</option>
            <option data-select2-id="22">Texas</option>
            <option data-select2-id="23">Washington</option>
        </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 634.5px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>
    </div>
    
    <div class="box-body">
        @include('admin.membros.includes.index.tableMembros', compact('membros'))
    </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        $('#add-membro').click(function(){
            $('').toggle();
        });   
    });
</script>
@endpush