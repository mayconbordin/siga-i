@extends('app')
 
@section('title')
@if (isset($turma))
    @lang('turmas.single_title') {{ $turma->nome }}
@else
    @lang('turmas.new')
@endif
 ::
@parent
@stop

@section('js')
<script id="diario-table-row" type="text/x-handlebars-template">
    @include('diarios.table-row', ['raw' => true])
</script>
<script id="envio-table-row" type="text/x-handlebars-template">
    @include('diarios.envio-table-row', ['raw' => true])
</script>
<script id="professor-table-row" type="text/x-handlebars-template">
    @include('professores.turma-table-row', ['raw' => true])
</script>
<script id="aluno-table-row" type="text/x-handlebars-template">
    @include('alunos.turma-table-row', ['raw' => true])
</script>

<script>

var Turma = (function() {
    var aulaForm = new Form({
        id                 : {el: "#newAulaId"              , required: false},
        data               : {el: "#newAulaData"            , required: true },
        horario_inicio     : {el: "#newAulaHorarioInicio"   , required: true},
        horario_fim        : {el: "#newAulaHorarioFim"      , required: true},
        ambiente_id        : {el: "#newAulaAmbienteId"      , required: true},
        conteudo           : {el: "#newAulaConteudo"        , required: false},
        obs                : {el: "#newAulaObs"             , required: false},
        ensino_a_distancia : {el: "#newAulaEnsinoDistancia" , required: false}
    });
    
    var diarioForm = new Form({
        mes: {el: "#closeDiarioMes", required: true}
    });
    
    var alunoForm = new Form({
        matricula      : {el: "#alunoNomeOrMatricula", required: true},
        status         : {el: "#alunoStatus"         , required: true},
        curso_origem_id: {el: "#alunoCursoOrigem"    , required: true}
    });
    
    var calendarOptions = {
        weekends: true,
        editable: true,
        eventStartEditable: true,
        eventDurationEditable: false,
        events: {
            //url: Router.get('base') + '/aulas',
            type: 'GET',
            error: function(err) {
                console.log(err);
            }
        },
        eventRender: function(event, element) {
            element.qtip({ // Grab some elements to apply the tooltip to
                content: {
                    text: 'Ir para a aula do dia ' + event.start.format('DD/MM')
                },
                position: {
                    my: 'top center',  // Position my top left...
                    at: 'bottom center', // at the bottom right of...
                    target: element
                },
                style: {
                    classes: 'qtip-tipsy'
                }
            })
        }
    };
    
    var selectedAluno     = null;
    var selectedProfessor = null;
    var selectedAmbiente  = null;
    var isEditAluno       = false;
    var editAlunoRow      = null;


    var Template = (function() {
        var envioTableRow     = $("#envio-table-row").html();
        var diarioTableRow    = $("#diario-table-row").html();
        var professorTableRow = $("#professor-table-row").html();
        var alunoTableRow     = $("#aluno-table-row").html();

        Handlebars.registerPartial('envio-table-row', envioTableRow);

        return {
            diarioTableRow   : Handlebars.compile(diarioTableRow),
            envioTableRow    : Handlebars.compile(envioTableRow),
            professorTableRow: Handlebars.compile(professorTableRow),
            alunoTableRow    : Handlebars.compile(alunoTableRow),
        }
    })();

    // altera estado
    var Model = {
        getAula: function(date, success, error) {
            $.ajax({
                url: Router.get('base') + '/aulas/' + date,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        updateAulaDate: function(id, date, success, error) {
            $.ajax({
                url: Router.get('base') + '/aulas/' + id + '/data',
                method: 'PUT',
                data: {data: date}
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        createAula: function(data, success, error) {
            data = this.normalizeAulaData(data);
            
            $.ajax({
                url: Router.get('base') + '/aulas',
                method: 'POST',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        },
        
        updateAula: function(date, data, success, error) {
            data = this.normalizeAulaData(data);
            
            $.ajax({
                url: Router.get('base') + '/aulas/' + date,
                method: 'PUT',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        },
        
        removeAula: function(date, success, error) {
            $.ajax({
                url: Router.get('base') + '/aulas/' + date,
                method: 'DELETE'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        },
        
        attachAluno: function(matricula, data, success, error) {
            data = this.normalizeAlunoData(data);
            
            $.ajax({
                url: Router.get('base') + '/alunos/' + matricula,
                method: 'POST',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        },
        
        updateAluno: function(matricula, data, success, error) {
            data = this.normalizeAlunoData(data);
            
            $.ajax({
                url: Router.get('base') + '/alunos/' + matricula,
                method: 'PUT',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        },
        
        detachAluno: function(matricula, success, error) {
            $.ajax({
                url: Router.get('base') + '/alunos/' + matricula,
                method: 'DELETE'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        },
        
        attachProfessor: function(matricula, success, error) {
            $.ajax({
                url: Router.get('base') + '/professores/' + matricula,
                method: 'PUT'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        },
        
        detachProfessor: function(matricula, success, error) {
            $.ajax({
                url: Router.get('base') + '/professores/' + matricula,
                method: 'DELETE'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        },
        
        normalizeAulaData: function(data) {
            data.ensino_a_distancia = data.ensino_a_distancia ? "1" : "0";
            delete data.id;
            return data;
        },
        
        normalizeAlunoData: function(data) {
            delete data.matricula;
            return data;
        },
        
        saveDiario: function(mes, success, error) {
            $.ajax({
                url: Router.get('base') + '/diarios/' + mes,
                method: 'PUT'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        },

        sendDiario: function(mes, success, error) {
            $.ajax({
                url: Router.get('base') + '/diarios/' + mes + '/enviar',
                method: 'POST'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                var errors = xhr.responseJSON;
                error(errors, xhr);
            });
        }
    };

    return {
        startDate: moment('{{ $turma->isActive() ? Carbon\Carbon::now()->format("d/m/Y") 
                                : $turma->data_inicio->format("d/m/Y") }}', 'DD/MM/YYYY'),

        turma: null,

        init: function() {
            var self = this;

            // ativa botão para salvar aulas
            $("#newAula .save").click(this.onSaveAulaForm);
            
            // ativa o calendário
            calendarOptions.events.url = Router.get('base') + '/aulas';

            $('#calendar').fullCalendar($.extend(calendarOptions, {
                dayClick: self.onDayClick,
                eventClick: self.onEventClick,
                eventDrop: self.onEventDrop
            }));
            
            // seta a data inicial
            $("#calendar").fullCalendar('gotoDate', this.startDate);
    
            // ativa o calendário ao abrir a aba dele
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $('#calendar').fullCalendar('render');
                e.preventDefault();
            });
            
            // ativa remoção de aulas
            $("#aulas .remove").click(this.onRemoveAulaClick);

            this.initTurmaEvents();
            this.initAlunoEvents();
            this.initProfessorEvents();
            this.initDiarioEvents();
            this.initAulaEvents();
        },

        initAulaEvents: function() {
            $("#newAulaAmbiente").typeahead({
                onSelect: function(item) {
                    selectedAmbiente = item;
                    $("#newAulaAmbienteId").val(item.value);
                },
                ajax: {
                    url: Router.get('ambientes'),
                    displayField: "nome",
                    valueField: "id",
                    method: "get",
                    preDispatch: function (query) {
                        return {
                            query: query
                        }
                    }
                }
            });

            // ativa timepickers
            $('.timepicker').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false,
                defaultTime: false
            });
        },

        initTurmaEvents: function() {
            /// ativa botão de edição
            $("#turmaEditBtn").click(this.onClickEdit);

            // ativa timepickers
            $('.timepicker').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false,
                defaultTime: false
            });

            $("#turmaAmbiente").typeahead({
                onSelect: function(item) {
                    $("#turmaAmbienteId").val(item.value);
                },
                ajax: {
                    url: Router.get('ambientes'),
                    displayField: "nome",
                    valueField: "id",
                    method: "get",
                    preDispatch: function (query) {
                        return {
                            query: query
                        }
                    }
                }
            });
        },
        
        initAlunoEvents: function() {
            var self = this;
            
            $("#vincularAlunoBtn").click(function() {
                $("#vincularAluno").modal('show');
            });
            
            $("#vincularAluno .save").click(this.onAttachAlunoClick);
            $("#alunos .detach").click(this.onDetachAlunoClick);
            $("#alunos .edit").click(this.onEditAlunoClick);
            
            $("#alunoNomeOrMatricula").typeahead({
                ajax: {
                    url: Router.get('alunos'),
                    displayField: "display_name",
                    valueField: "matricula",
                    method: "get",
                    preDispatch: function (query) {
                        return {
                            query: query,
                            turmaId: "{{ $turma->id }}"
                        }
                    },
                }
            });
            
            $("#vincularAluno").on('hidden.bs.modal', function (e) {
                alunoForm.cleanValues();
                isEditAluno = false;
            });
        },
        
        initProfessorEvents: function() {
            var self = this;
            
            $("#vincularProfessorBtn").click(function() {
                $("#vincularProfessor").modal('show');
            });
            
            $("#vincularProfessor .save").click(this.onAttachProfessorClick);
            $("#professores .detach").click(this.onDetachProfessorClick);
            
            $("#professorNomeOrMatricula").typeahead({
                onSelect: function(item) {
                    selectedProfessor = item;
                },
                ajax: {
                    url: Router.get('professores'),
                    displayField: "display_name",
                    valueField: "matricula",
                    method: "get",
                    preDispatch: function (query) {
                        return {
                            query: query,
                            turmaId: "{{ $turma->id }}"
                        }
                    },
                }
            });
            
            $("#vincularProfessor").on('hidden.bs.modal', function (e) {
                selectedProfessor = null;
                $("#professorNomeOrMatricula").val("");
                $("#professorNomeOrMatricula").parent().removeClass('has-error');
            });
        },

        initDiarioEvents: function() {
            var self = this;
            
            $("#closeDiarioBtn").click(function() {
                $("#closeDiario").modal('show');
            });
            
            $("#closeDiario .save").click(this.onSaveDiarioClick);
            $("#closeDiarioPreview").click(this.onDiarioPreview);
            $("#diarios-table>tbody .send").click(this.onSendDiarioClick);
        },
        
        
        
        // utilities -----------------------------------------------------------
        
        addAulaToCalendar: function(aula, ambienteNome) {
            $('#calendar').fullCalendar('renderEvent', {
                id: aula.id,
                title: ambienteNome,
                start: moment(aula.data, 'DD/MM/YYYY').format('YYYY-MM-DD') + 'T' + aula.horario_inicio,
                end: moment(aula.data, 'DD/MM/YYYY').format('YYYY-MM-DD') + 'T' + aula.horario_fim,
                allDay: false
            });
        },
        
        addAlunoToTable: function(aluno) {
            var html = Template.alunoTableRow({
                aluno: aluno,
                can_edit: {{ Auth::user()->can('edit-turma') ? 'true' : 'false' }}
            });

            $("#alunos table>tbody").append(html);
            $("#alunos .detach").click(this.onDetachAlunoClick);
            $("#alunos .edit").click(this.onEditAlunoClick);
        },

        updateAlunoToTable: function(aluno, tr) {
            var html = Template.alunoTableRow({
                aluno: aluno,
                can_edit: {{ Auth::user()->can('edit-turma') ? 'true' : 'false' }}
            });

            $(tr).replaceWith(html);

            $("#alunos .detach").click(this.onDetachAlunoClick);
            $("#alunos .edit").click(this.onEditAlunoClick);
        },
        
        addProfessorToTable: function(professor) {
            var html = Template.professorTableRow({
                professor: professor,
                can_edit: {{ Auth::user()->can('edit-turma') ? 'true' : 'false' }}
            });

                        
            $("#professores table>tbody").append(html);
            $("#professores .detach").click(this.onDetachProfessorClick);
        },
        
        addDiarioToTable: function(diario) {
            var html = Template.diarioTableRow({
                diario: diario,
                print_url: Router.get('diarios')
            });

            $("#diarios-table>tbody").append(html);
            $("#diarios-table>tbody .send").click(this.onSendDiarioClick);
        },


        addDiarioEnvioToTable: function(envio, diarioId) {
            envio.print_url = Router.get('diarios');

            var tableBody = $("#diario-"+diarioId+" table tbody");
            tableBody.append(Template.envioTableRow(envio));
        },

        // eventos -------------------------------------------------------------
        
        onClickEdit: function() {
            $("#turmaForm fieldset").prop('disabled', $(this).hasClass("editing"));
            $(this).toggleClass("editing btn-primary btn-danger");
            
            if ($(this).hasClass("editing")) {
                $(this).html(Lang.get("general.cancel"));
            } else {
                $(this).html(Lang.get("general.edit"));
            }
        },
        
        onDayClick: function(date) {
            aulaForm.cleanValues();
            $("#newAula").modal("show");
            $("#newAulaData").val(date.format('DD/MM/YYYY'));
            $("#newAulaHorarioInicio").val(Turma.turma.horario_inicio);
            $("#newAulaHorarioFim").val(Turma.turma.horario_fim);
            $("#newAulaAmbiente").val(Turma.turma.ambiente.nome);
            $("#newAulaAmbienteId").val(Turma.turma.ambiente.id);
        },
        
        onEventClick: function(event) {
            // redireciona para página da aula
            window.location = Router.get('turma') + "/aulas/" + event.start.format('YYYY-MM-DD');
        },
        
        onEventDrop: function(event, delta, revertFunc) {
            console.log(event.title + " was dropped on " + event.start.format());
            
            var id   = event.id;
            var date = event.start.format('DD/MM/YYYY');
            
            Model.updateAulaDate(id, date, function(result) {
                console.log(result);
            }, function(error) {
                console.log(error);
                revertFunc();
            });
        },

        onSaveAulaForm: function() {
            var data = aulaForm.getValues();

            if (data.hasErrors) {
                aulaForm.validate(data.errors);
                return;
            }
            
            var isNew = (data.values.id == "");

            // cria nova aula
            if (isNew) {
                if (selectedAmbiente == null) {
                    var ambienteNome = $("#newAulaAmbiente").val();
                } else {
                    var ambienteNome = selectedAmbiente.text;
                }

                Model.createAula(data.values, function(result) {
                    $("#newAula").modal('hide');
                    Modal.success(result.message);
                    
                    Turma.addAulaToCalendar(result.aula, ambienteNome);
                }, function(errors) {
                    aulaForm.validate(errors);
                });
            }

            // atualiza aula
            else {
                var d = moment(data.values.data, 'DD/MM/YYYY').format('YYYY-MM-DD');
                
                Model.updateAula(d, data.values, function(result) {
                    $("#newAula").modal('hide');
                    Modal.success(result.message);
                }, function(errors) {
                    aulaForm.validate(errors);
                });
            }
        },
        
        onRemoveAulaClick: function(e) {
            var tr = $(e.currentTarget).parent().parent();
            var data = tr.data('data');
            
            Modal.confirm(Lang.get('aulas.remove_message'), function(result) {
                if (result == true) {
                    Model.removeAula(data, function(result) {
                        Modal.success(result.message);
                        
                        tr.fadeOut(function() {
                            tr.remove();
                        });
                    }, function(errors) {
                        Modal.error(errors);
                    });
                }
            });
        },
        
        onAttachAlunoClick: function() {
            var data = alunoForm.getValues();

            if (data.hasErrors) {
                alunoForm.validate(data.errors);
                return;
            }
            
            var matricula = data.values.matricula.split('|')[0].trim();

            // Edição do aluno
            if (isEditAluno) {
                Model.updateAluno(matricula, data.values, function(result) {
                    $("#vincularAluno").modal('hide');
                    Modal.success(result.message);
                    isEditAluno = false;
                    Turma.updateAlunoToTable(result.aluno, editAlunoRow);
                }, function(error) {
                    $("#vincularAluno").modal('hide');
                    Modal.error(error.errors.join('<br>'));
                });
            }

            // Criação de novo vínculo
            else {
                Model.attachAluno(matricula, data.values, function(result) {
                    $("#vincularAluno").modal('hide');
                    Modal.success(result.message);
                    Turma.addAlunoToTable(result.aluno);
                }, function(error) {
                    $("#vincularAluno").modal('hide');
                    Modal.error(error.errors.join('<br>'));
                });
            }
        },
        
        onDetachAlunoClick: function() {
            var tr = $(this).parent().parent();
            var matricula = tr.data('matricula');
            
            Modal.confirm(Lang.get('turmas.aluno_detach'), function(result) {
                if (result == false) return;
                
                Model.detachAluno(matricula, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(r) {
                    Modal.error(r.errors.join('<br>'));
                });
            });
        },
        
        onEditAlunoClick: function() {
            $("#vincularAluno").modal('show');

            editAlunoRow = $(this).parent().parent();
            var data = $.extend({}, editAlunoRow.data());
            data.matricula = data.matricula + ' | ' + data.nome;
            delete data.nome;

            alunoForm.setValues(data);
            isEditAluno = true;
        },
        
        onAttachProfessorClick: function() {
            if (selectedProfessor == null) {
                $("#professorNomeOrMatricula").parent().addClass('has-error');
                return;
            }
            
            var matricula = selectedProfessor.value;
                
            Model.attachProfessor(matricula, function(result) {
                $("#vincularProfessor").modal('hide');
                Modal.success(result.message);
                Turma.addProfessorToTable(result.professor);
            }, function(error) {
                $("#vincularProfessor").modal('hide');
                Modal.error(error.errors.join('<br>'));
            });
        },
        
        onDetachProfessorClick: function() {
            var tr = $(this).parent().parent();
            var matricula = tr.data('matricula');
            
            Modal.confirm(Lang.get('turmas.professor_detach'), function(result) {
                if (result == false) return;
                
                Model.detachProfessor(matricula, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(r) {
                    Modal.error(r.errors.join('<br>'));
                });
            });
        },
        
        onSaveDiarioClick: function() {
            var data = diarioForm.getValues();

            if (data.hasErrors) {
                diarioForm.validate(data.errors);
                return;
            }
            
            Model.saveDiario(data.values.mes, function(result) {
                $("#closeDiario").modal('hide');
                Modal.success(result.message);
                Turma.addDiarioToTable(result.diario);
            }, function(error) {
                $("#closeDiario").modal('hide');
                Modal.error(error.errors.join('<br>'));
            });
        },
        
        onDiarioPreview: function() {
            var data  = diarioForm.getValues();
            var month = data.values.mes; 

            window.open(Router.get('diarios') + '/' + month, 'diarioPreview');
        },

        onSendDiarioClick: function() {
            var tr = $(this).parent().parent();
            var data = tr.data();

            Model.sendDiario(data.mes, function(result) {
                Modal.success(result.message);
                Turma.addDiarioEnvioToTable(result.envio, data.id);
            }, function(error) {
                Modal.error(error.errors.join('<br>'));
            });
        }
    };
})();

$(document).ready(function() {
@if (isset($turma))
    Router.registerAll({
        base: "{{ url('api/unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id) }}",
        diarios: "{{ url('/unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id.'/diarios') }}",
        turma: "{{ url('unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id) }}",
        alunos: "{{ url('api/alunos') }}",
        professores: "{{ url('api/professores') }}",
        ambientes: "{{ url('api/ambientes') }}"
    });

    Lang.registerAll({
        'turmas.professor_detach': "@lang('turmas.professor_detach')",
        'turmas.aluno_detach': "@lang('turmas.aluno_detach')",
        'aulas.remove_message': "@lang('aulas.remove_message')",
        'general.cancel': "@lang('general.cancel')",
        'general.edit': "@lang('general.edit')"
    });

    Turma.turma = {
        id: {{ $turma->id }},
        horario_inicio: '{{ $turma->horario_inicio->format('H:i:s') }}',
        horario_fim: '{{ $turma->horario_fim->format('H:i:s') }}',
        ambiente: {
            id: {{ $turma->ambienteDefault->id }},
            nome: '{{ $turma->ambienteDefault->nome }}'
        }
    };

    Turma.init();
@endif
});
</script>
@endsection

@section('content')
<div class="col-xs-12">

    @include('utils.alerts')

    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>

        @if (Auth::user()->hasRole('coordenador'))
        <li><a href="{{ url('/unidades_curriculares') }}">@lang('unidades_curriculares.title')</a></li>
        <li><a href="{{ url('/unidades_curriculares', ['id' => $unidadeCurricular->id]) }}">
            {{ $unidadeCurricular->nome }}</a>
        </li>
        @else
        <li>@lang('unidades_curriculares.title')</li>
        <li>{{ $unidadeCurricular->nome }}</li>
        @endif
        
        <li class="active">
        @if (isset($turma))
            @lang('turmas.single_title') {{ $turma->nome }}
        @else
            @lang('turmas.new')
        @endif
        </li>
    </ol>

    {{-- Modal para criar/editar aulas --}}
    @include('aulas.modal')
    
    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            
            <li role="presentation" class="active"><a href="#main" aria-controls="main"
                role="tab" data-toggle="tab">@lang('turmas.single_title')</a></li>    
           
            @if (isset($turma))
            <li role="presentation" id="tabCalendar"><a href="#calendario" aria-controls="calendario"
                role="tab" data-toggle="tab">@lang('turmas.calendar')</a></li>
                
            <li role="presentation"><a href="#aulas" aria-controls="aulas"
                role="tab" data-toggle="tab">@lang('aulas.title')</a></li>
            <li role="presentation"><a href="#alunos" aria-controls="alunos"
                role="tab" data-toggle="tab">@choice('alunos.title', 2)</a></li>
            <li role="presentation"><a href="#professores" aria-controls="professores"
                role="tab" data-toggle="tab">@choice('professores.title', 2)</a></li>
            <li role="presentation"><a href="#controle-faltas" aria-controls="controle-faltas"
                role="tab" data-toggle="tab">@lang('turmas.controle_faltas')</a></li>
            <li role="presentation"><a href="#diarios" aria-controls="diarios"
                role="tab" data-toggle="tab">@lang('turmas.diaries')</a></li>
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
                                @if (isset($turma) && Auth::user()->can('edit-turma'))
                                <a id="turmaEditBtn" href="#" title="" class="btn btn-primary btn-xs edit">
                                    @lang('general.edit')
                                </a>
                                @endif
                            </div>
                        </div>
                    
                        @include('turmas.form')
                    </div>
                </div>
            </div>
            
            @if (isset($turma))
            
            {{-- Aba do calendário de aulas --}}
            <div role="tabpanel" class="tab-pane" id="calendario">
                <div id="calendar" class="calendar"></div>
            </div>
        
            {{-- Aba de lista de aulas --}}
            @include('turmas.tabs.aulas')
            
            {{-- Aba de lista de alunos --}}
            @include('turmas.tabs.alunos')
            
            {{-- Aba de lista de professores --}}
            @include('turmas.tabs.professores')

            {{-- Aba de controle de faltas --}}
            @include('turmas.tabs.controle_faltas')

            {{-- Aba de diários --}}
            @include('turmas.tabs.diarios')
            
            @endif
            
        </div><!-- /.tab-content -->

    </div><!-- /.tabpanel -->
    
</div>
@endsection
