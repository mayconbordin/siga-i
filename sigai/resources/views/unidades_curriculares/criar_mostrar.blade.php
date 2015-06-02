@extends('app')
 
@section('title')
{{ isset($uc) ? $uc->nome : Lang::get('unidades_curriculares.new_uc') }} ::
@parent
@stop


@section('js')
<script>
@if (isset($uc))


var UnidadeCurricular = (function() {

    var baseUrl = "{{ url('api/unidades_curriculares/'.$uc->id) }}";

    var turmaForm = new Form({
        nome       : {el: "#newTurmaNome"      , required: true},
        data_inicio: {el: "#newTurmaDataInicio", required: true},
        data_fim   : {el: "#newTurmaDataFim"   , required: true}
    });

    var selectedCurso = null;
    
    var Model = {
        getCurso: function(id, success, error) {
            $.ajax({
                url: "{{ url('api/cursos') }}/" + id,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        attachCurso: function(id, success, error) {
            $.ajax({
                url: baseUrl + '/cursos/' + id,
                method: 'PUT'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        detachCurso: function(id, success, error) {
            $.ajax({
                url: baseUrl + '/cursos/' + id,
                method: 'DELETE'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        createTurma: function(data, success, error) {
            $.ajax({
                url: baseUrl + '/turmas',
                method: 'POST',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        removeTurma: function(id, success, error) {
            $.ajax({
                url: baseUrl + '/turmas/' + id,
                method: 'DELETE'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        }
    };
    
    return {
        init: function() {
            // ativa botão de edição
            $("#ucEditBtn").click(this.onClickEdit);
            
            this.initCursoEvents();
            this.initAulaEvents();
        },
        
        initCursoEvents: function() {
            $("#vincularCursoBtn").click(function() {
                $("#vincularCurso").modal('show');
            });
            
            $("#vincularCurso .save").click(this.onAttachCursoClick);
            
            // ativa o autocomplete
            $("#vincularCursoNome").typeahead({
                onSelect: function(item) {
                    selectedCurso = item;
                },
                ajax: {
                    url: "{{ url('api/cursos') }}",
                    displayField: "nome",
                    valueField: "id",
                    method: "get"
                }
            });
            
            // limpa dados ao fechar modal
            $("#vincularCurso").on('hidden.bs.modal', function (e) {
                selectedCurso = null;
                $("#vincularCursoNome").val("");
                $("#vincularCursoNome").parent().removeClass('has-error');
            });
            
            // ativa função desvíncular curso
            $("#cursos table .detach").click(this.onDetachCursoClick);
        },
        
        initAulaEvents: function() {
            $("#criarTurmaBtn").click(function() {
                $("#newTurma").modal('show');
            });
            
            $("#newTurma .save").click(this.onSaveTurmaClick);
            $("#turmas table .remove").click(this.onRemoveTurmaClick);
        },
        
        // utilities -----------------------------------------------------------
        
        addCursoToTable: function(curso) {
            var html = '<tr data-id="'+curso.id+'"><th scope="row">'+curso.id+'</th>'
                     + '<td>'+curso.nome+'</td><td>'+curso.sigla+'</td>'
                     + '<td class="text-center">'
                     + '<button class="btn btn-default btn-xs detach">'
                     + '<i class="fa fa-chain-broken"></i> @lang("general.detach")'
                     + '</button></td></tr>';
                     
            $("#cursos table tbody").append(html);
            $("#cursos table .detach").click(this.onDetachCursoClick);
        },
        
        addTurmaToTable: function(turma) {
            var html = '<tr data-id="'+turma.id+'"><th scope="row">'+turma.id+'</th>'
                     + '<td><a href="'+baseUrl+'/turmas/'+turma.id+'">'+turma.nome
                     + '</a></td><td>'+turma.data_inicio+'</td>'
                     + '<td>'+turma.data_fim+'</td>'
                     + '<td class="text-center">'
                     + '<button class="btn btn-default btn-xs remove">'
                     + '<i class="fa fa-remove"></i> @lang("general.remove")'
                     + '</button></td></tr>';
                     
            $("#turmas table tbody").append(html);
            $("#turmas table .remove").click(this.onRemoveTurmaClick);
        },
        
        // eventos -------------------------------------------------------------
        onClickEdit: function() {
            $("#ucForm fieldset").prop('disabled', $(this).hasClass("editing"));
            $(this).toggleClass("editing btn-primary btn-danger");
            
            if ($(this).hasClass("editing")) {
                $(this).html('@lang("general.cancel")');
            } else {
                $(this).html('@lang("general.edit")');
            }
        },
        
        onAttachCursoClick: function() {
            if (selectedCurso == null) {
                $("#vincularCursoNome").parent().addClass('has-error');
                return;
            }
            
            var id = selectedCurso.value;
            
            Model.attachCurso(id, function(result) {
                $("#vincularCurso").modal('hide');
                Modal.success(result.message);
                UnidadeCurricular.addCursoToTable(result.curso);
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        },
        
        onDetachCursoClick: function() {
            var tr = $(this).parent().parent();
            var id = $(tr).data('id');
            
            Modal.confirm("@lang('unidades_curriculares.curso_detach')", function(result) {
                if (result == false) return;
                
                Model.detachCurso(id, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(r) {
                    Modal.error(r.errors.join('<br>'));
                });
            });
        },
        
        onSaveTurmaClick: function() {
            var data = turmaForm.getValues();

            if (data.hasErrors) {
                turmaForm.validate(data.errors);
                return;
            }
            
            Model.createTurma(data.values, function(result) {
                $("#newTurma").modal('hide');
                Modal.success(result.message);
                UnidadeCurricular.addTurmaToTable(result.turma);
            }, function(errors) {
                turmaForm.validate(errors);
            });
        },
        
        onRemoveTurmaClick: function() {
            var tr = $(this).parent().parent();
            var id = $(tr).data('id');
            
            Modal.confirm("@lang('turmas.remove_message')", function(result) {
                if (result == false) return;
                
                Model.removeTurma(id, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(r) {
                    Modal.error(r.errors.join('<br>'));
                });
            });
        }
    };
})();
    

$(document).ready(function($) {
    
    UnidadeCurricular.init();
    
});

@endif
</script>
@endsection

@section('content')
<div class="col-xs-12">

    @include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li><a href="{{ url('/unidades_curriculares') }}">@lang('unidades_curriculares.title')</a></li>
        <li class="active">{{ isset($uc) ? $uc->nome : Lang::get('unidades_curriculares.new_uc') }}</li>
    </ol>

    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#main" aria-controls="main"
                role="tab" data-toggle="tab">@lang('unidades_curriculares.single_title')</a></li>
        
            @if (isset($uc))
            <li role="presentation"><a href="#cursos" aria-controls="cursos"
                role="tab" data-toggle="tab">@lang('cursos.title')</a></li>
            <li role="presentation"><a href="#turmas" aria-controls="turmas"
                role="tab" data-toggle="tab">@lang('turmas.title')</a></li>
            @endif
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
        
            {{-- Aba principal --}}
            <div role="tabpanel" class="tab-pane active" id="main">
                <div class="panel panel-tabbed">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @if (isset($uc))
                                <a id="ucEditBtn" href="#" title="" class="btn btn-primary btn-xs edit">
                                    @lang('general.edit')
                                </a>
                                @endif
                            </div>
                        </div>
                    
                        @include('unidades_curriculares.form')
                    </div>
                </div>
            </div>
        
            {{-- Mostra depois de a UC ter sido criada --}}
            @if (isset($uc))
            
            {{-- Tabela de Cursos vínculados a UC --}}
            <div role="tabpanel" class="tab-pane" id="cursos">
                <div class="tab-actions">
                    <a id="vincularCursoBtn" class="btn btn-primary attach" href="#">
                        <i class="fa fa-chain"></i> @lang('cursos.attach')
                    </a>
                </div>
                
                @include('cursos.vincular_modal')
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('cursos.id')</th>
                            <th>@lang('cursos.nome')</th>
                            <th>@lang('cursos.sigla')</th>
                            <th class="text-center">@lang('general.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($uc->cursos as $c)
                        <tr data-id="{{ $c->id }}">
                            <th scope="row">{{ $c->id }}</th>
                            <td>{{ $c->nome }}</td>
                            <td>{{ $c->sigla }}</td>
                            <td class="text-center">
                                <button class="btn btn-default btn-xs detach">
                                    <i class="fa fa-chain-broken"></i> @lang('general.detach')
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{-- Tabela de Turmas da UC --}}
            <div role="tabpanel" class="tab-pane" id="turmas">
                <div class="tab-actions">
                    <a id="criarTurmaBtn" class="btn btn-primary attach" href="#">
                        <i class="fa fa-plus"></i> @lang('turmas.create')
                    </a>
                </div>
                
                @include('turmas.criar_modal')
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('turmas.id')</th>
                            <th>@lang('turmas.nome')</th>
                            <th>@lang('turmas.data_inicio')</th>
                            <th>@lang('turmas.data_fim')</th>
                            <th class="text-center">@lang('general.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($uc->turmas as $t)
                        <tr data-id="{{ $t->id }}">
                            <th scope="row">{{ $t->id }}</th>
                            <td>
                                <a href="{{ url('/unidades_curriculares/'.$uc->id.'/turmas/'.$t->id) }}">
                                {{ $t->nome }}
                                </a>
                            </td>
                            <td>{{ $t->data_inicio->format('d/m/Y') }}</td>
                            <td>{{ $t->data_fim->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <button class="btn btn-default btn-xs remove">
                                    <i class="fa fa-remove"></i> @lang('general.remove')
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @endif
            
        </div><!-- /.tab-content -->
    </div><!-- /.tabpanel -->
    
</div>
@endsection
