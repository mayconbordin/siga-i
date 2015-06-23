@extends('app')
 
@section('title')
{{ isset($uc) ? $uc->nome : Lang::get('unidades_curriculares.new_uc') }} ::
@parent
@stop


@section('js')
<script id="curso-table-row" type="text/x-handlebars-template">
    @include('cursos.uc-table-row', ['raw' => true])
</script>
<script id="turma-table-row" type="text/x-handlebars-template">
    @include('turmas.table-row', ['raw' => true])
</script>

<script>
@if (isset($uc))
var UnidadeCurricular = (function() {
    var turmaForm = new Form({
        nome       : {el: "#newTurmaNome"      , required: true},
        data_inicio: {el: "#newTurmaDataInicio", required: true},
        data_fim   : {el: "#newTurmaDataFim"   , required: true}
    });

    var selectedCurso = null;

    var Template = (function() {
        var cursoTableRow = $("#curso-table-row").html();
        var turmaTableRow = $("#turma-table-row").html();

        return {
            cursoTableRow: Handlebars.compile(cursoTableRow),
            turmaTableRow: Handlebars.compile(turmaTableRow)
        }
    })();
    
    var Model = {
        getCurso: function(id, success, error) {
            $.ajax({
                url: Router.get('curso') + "/" + id,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        attachCurso: function(id, success, error) {
            $.ajax({
                url: Router.get('api.base') + '/cursos/' + id,
                method: 'PUT'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        detachCurso: function(id, success, error) {
            $.ajax({
                url: Router.get('api.base') + '/cursos/' + id,
                method: 'DELETE'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        createTurma: function(data, success, error) {
            $.ajax({
                url: Router.get('api.base') + '/turmas',
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
                url: Router.get('api.base') + '/turmas/' + id,
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
                    url: Router.get('curso'),
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
            var html = Template.cursoTableRow({
                curso: curso,
                detach: true
            });
                     
            $("#cursos table tbody").append(html);
            $("#cursos table .detach").click(this.onDetachCursoClick);
        },
        
        addTurmaToTable: function(turma) {
            turma.url = Router.get('base') + '/turmas/' + turma.id;

            var html = Template.turmaTableRow({
                turma: turma,
                remove: true
            });
                     
            $("#turmas table tbody").append(html);
            $("#turmas table .remove").click(this.onRemoveTurmaClick);
        },
        
        // eventos -------------------------------------------------------------
        onClickEdit: function() {
            $("#ucForm fieldset").prop('disabled', $(this).hasClass("editing"));
            $(this).toggleClass("editing btn-primary btn-danger");
            
            if ($(this).hasClass("editing")) {
                $(this).html(Lang.get('general.cancel'));
            } else {
                $(this).html(Lang.get('general.edit'));
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
            
            Modal.confirm(Lang.get('unidades_curriculares.curso_detach'), function(result) {
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
            
            Modal.confirm(Lang.get('turmas.remove_message'), function(result) {
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
    Router.registerAll({
        'api.base': "{{ url('api/unidades_curriculares/'.$uc->id) }}",
        base: "{{ url('/unidades_curriculares/'.$uc->id) }}",
        curso: "{{ url('api/cursos') }}"
    });

    Lang.registerAll({
        'turmas.remove_message': "@lang('turmas.remove_message')",
        'unidades_curriculares.curso_detach': "@lang('unidades_curriculares.curso_detach')",
        'general.cancel': "@lang('general.cancel')",
        'general.edit': "@lang('general.edit')"
    });

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
            @include('unidades_curriculares.tabs.cursos')
            
            {{-- Tabela de Turmas da UC --}}
            @include('unidades_curriculares.tabs.turmas')
            
            @endif
            
        </div><!-- /.tab-content -->
    </div><!-- /.tabpanel -->
    
</div>
@endsection
