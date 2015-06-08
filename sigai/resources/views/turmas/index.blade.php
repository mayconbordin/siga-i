@extends('app')
 
@section('title')
@lang('turmas.title') ::
@parent
@stop

@section('css')
<link href="{{ asset('/css/bootstrap-table.min.css') }}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{ asset('/js/bootstrap-table.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-table-toolbar.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-table-pt-BR.min.js') }}"></script>

<script>
$(document).ready(function($) {
});

function parseData(res) {
    return res.data;
}

function parseProfessores(professores) {
    return professores.map(function(p) {
        return p.usuario.nome;
    }).join(", ");
}

function formatData(data) {
    return data.date.split(" ")[0];
}

function parseUnidadeCurricular(uc) {
    return uc.sigla;
}

function parseQueryParams(params) {
    params.page = (params.offset / params.limit) + 1;
    
    console.log(params);
    return params;
}
</script>
@endsection

@section('content')
<div class="col-xs-12">
	@include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@lang('turmas.title')</li>
    </ol>
    
    <div id="turmaToolbar">
        <form class="form-inline">
            <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </form>
    </div>
  
    {{-- Lista Turmas --}}
    <table class="table" id="turmas"
           data-toggle="table"
           data-url="{{ url('/api/turmas') }}"
           data-query-params="parseQueryParams"
           data-sort-name="id"
           data-sort-order="asc"
           data-pagination="true"
           data-side-pagination="server"
           data-page-list="[5, 10, 20, 50, 100, 200]"
           data-search="true"
           data-toolbar="#turmaToolbar"
           data-toolbar-align="right"
           >
        <thead>
            <tr>
                <th data-field="id"
                    data-sortable="true">
                    @lang('turmas.id')
                </th>
                <th data-field="nome"
                    data-sortable="true">
                    @lang('turmas.nome')
                </th>
                <th data-field="data_inicio"
                    data-formatter="formatData"
                    data-sortable="true">
                    @lang('turmas.data_inicio')
                </th>
                <th data-field="data_fim"
                    data-formatter="formatData"
                    data-sortable="true">
                    @lang('turmas.data_fim')
                </th>
                <th data-field="unidade_curricular"
                    data-formatter="parseUnidadeCurricular"
                    data-sortable="true"
                    data-sort-name="unidadeCurricular.sigla"
                    class="text-center">
                    @lang('unidades_curriculares.single_title')
                </th>
                <th data-field="professores"
                    data-formatter="parseProfessores">
                    @choice('professores.title', 2)
                </th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
