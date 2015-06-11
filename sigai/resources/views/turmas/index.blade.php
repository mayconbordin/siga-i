@extends('app')
 
@section('title')
@lang('turmas.title') ::
@parent
@stop

@section('js')
<script>
$(document).ready(function($) {

    // vai para página da turma ao clicar no registro
    $("#turmas").on("click-row.bs.table", function(row, el) {
        window.location = "{{ url('/unidades_curriculares') }}/" + el.unidade_curricular_id
                        + "/turmas/" + el.id;
    });

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
    params.page  = (params.offset / params.limit) + 1;
    params.field = $("#searchField").val();
    
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
    
    <div id="turmaToolbar" class="table-toolbar">
        <form class="form-inline">
            <select id="searchField" class="form-control">
                <option value="nome">Nome</option>
                <option value="data_inicio">Data de Início</option>
                <option value="data_fim">Data de Fim</option>
                <option value="unidade_curricular">Unidade Curricular</option>
                <option value="professores">Professores</option>
            </select>
        </form>
    </div>
  
    {{-- Lista Turmas --}}
    <table class="table table-clickable" id="turmas"
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
