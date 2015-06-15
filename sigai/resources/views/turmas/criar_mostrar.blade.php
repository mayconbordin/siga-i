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
<script>

var Turma = (function() {

    // estado
    var baseUrl = "{{ url('api/unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id) }}";
    
    var aulaForm = new Form({
        id                 : {el: "#newAulaId"              , required: false},
        data               : {el: "#newAulaData"            , required: true },
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
            url: baseUrl + '/aulas',
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
    
    var selectedAluno = null;
    var selectedProfessor = null;
    var isEditAluno = false;
    
    
    // altera estado
    var Model = {
        getAula: function(date, success, error) {
            $.ajax({
                url: baseUrl + '/aulas/' + date,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        updateAulaDate: function(id, date, success, error) {
            $.ajax({
                url: baseUrl + '/aulas/' + id + '/data',
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
                url: baseUrl + '/aulas',
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
                url: baseUrl + '/aulas/' + date,
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
                url: baseUrl + '/aulas/' + date,
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
                url: baseUrl + '/alunos/' + matricula,
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
                url: baseUrl + '/alunos/' + matricula,
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
                url: baseUrl + '/alunos/' + matricula,
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
                url: baseUrl + '/professores/' + matricula,
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
                url: baseUrl + '/professores/' + matricula,
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
                url: baseUrl + '/diarios/' + mes,
                method: 'PUT'
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
        
        init: function() {
            var self = this;

            /// ativa botão de edição
            $("#turmaEditBtn").click(this.onClickEdit);
            
            // ativa botão para salvar aulas
            $("#newAula .save").click(this.onSaveAulaForm);
            
            // ativa o calendário
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
            
            this.initAlunoEvents();
            this.initProfessorEvents();
            this.initDiarioEvents();
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
                    url: "{{ url('api/alunos') }}",
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
                    url: "{{ url('api/professores') }}",
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
        },
        
        
        
        // utilities -----------------------------------------------------------
        
        addAulaToCalendar: function(aula) {
            $('#calendar').fullCalendar('renderEvent', {
                id: aula.id,
                title: "Aula",
                start: moment(aula.data, 'DD/MM/YYYY').format('YYYY-MM-DD'),
                allDay: true
            });
        },
        
        addAlunoToTable: function(aluno) {
             var html = '<tr data-matricula="'+aluno.matricula+'" data-nome="'+aluno.nome+'"'
                      + 'data-status="'+aluno.status+'" data-curso_origem_id="'+aluno.curso_origem_id+'">'
                      + '<td scope="row">'+aluno.matricula+'</td><td>'+aluno.nome+'</td>'
                      + '<td>'+(aluno.curso_origem_sigla || '--')+'</td>'
                      + '<td class="text-center">';
                      
            if (alunos.status == '{{ App\Models\Aluno::STATUS_NORMAL }}')
                html += '<span class="label label-default">'+aluno.status+'</span>';
            else if (alunos.status == '{{ App\Models\Aluno::STATUS_CANCELADO }}')
                html += '<span class="label label-danger">'+aluno.status+'</span>';
            else
                html += '<span class="label label-warning">'+aluno.status+'</span>';
                                
            html += '</td><td class="text-center"><button class="btn btn-default btn-xs detach">'
                  + '<i class="fa fa-remove"></i> @lang("general.detach")</button>'
                  + '<button class="btn btn-default btn-xs edit">'
                  + '<i class="fa fa-edit"></i> @lang("general.edit")</button></td></tr>';

            $("#alunos table tbody").append(html);
            $("#alunos .detach").click(this.onDetachAlunoClick);
            $("#alunos .edit").click(this.onEditAlunoClick);
        },
        
        addProfessorToTable: function(professor) {
            var html = '<tr data-matricula="'+professor.matricula+'">'
                     + '<td scope="row">'+professor.matricula+'</td>'
                     + '<td>'+professor.nome+'</td>'
                     + '<td class="text-center"><button class="btn btn-default btn-xs detach">'
                     + '<i class="fa fa-remove"></i> @lang("general.detach")'
                     + '</button></td></tr>';
                        
            $("#professores table tbody").append(html);
            $("#professores .detach").click(this.onDetachProfessorClick);
        },
        
        addDiarioToTable: function(diario) {
            var url = '{{ url("/unidades_curriculares/".$unidadeCurricular->id."/turmas/".$turma->id."/diarios") }}';

            var html = '<tr data-id="'+diario.id+'"><td scope="row" class="text-center">'+diario.mes+'</td>'
                     + '<td>'+diario.professor.nome+'</td><td>'+diario.created_at+'</td>'
                     + '<td class="text-center"><a class="btn btn-danger btn-xs" target="diarioClasse"'
                     + 'href="'+url+'/'+diario.mes+'"><i class="fa fa-file-pdf-o"></i> Imprimir'
                     + '</a></td></tr>';
                        
            $("#diarios table tbody").append(html);
        },

        // eventos -------------------------------------------------------------
        
        onClickEdit: function() {
            $("#turmaForm fieldset").prop('disabled', $(this).hasClass("editing"));
            $(this).toggleClass("editing btn-primary btn-danger");
            
            if ($(this).hasClass("editing")) {
                $(this).html('@lang("general.cancel")');
            } else {
                $(this).html('@lang("general.edit")');
            }
        },
        
        onDayClick: function(date) {
            aulaForm.cleanValues();
            $("#newAula").modal("show");
            $("#newAulaData").val(date.format('DD/MM/YYYY'));
        },
        
        onEventClick: function(event) {
            // redireciona para página da aula
            window.location = "{{ url('unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id) }}"
                            + "/aulas/" + event.start.format();
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
                Model.createAula(data.values, function(result) {
                    $("#newAula").modal('hide');
                    Modal.success(result.message);
                    
                    Turma.addAulaToCalendar(result.aula);
                }, function(errors) {
                    aulaForm.validate(errors);
                });
            } else { // atualiza aula
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
            
            Modal.confirm("@lang('aulas.remove_message')", function(result) {
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
            
            if (isEditAluno) {
                Model.updateAluno(matricula, data.values, function(result) {
                    $("#vincularAluno").modal('hide');
                    Modal.success(result.message);
                }, function(error) {
                    $("#vincularAluno").modal('hide');
                    Modal.error(error.errors.join('<br>'));
                });
            } else {
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
            
            Modal.confirm("@lang('turmas.aluno_detach')", function(result) {
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
            
            var tr = $(this).parent().parent();
            var data = tr.data();
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
            
            Modal.confirm("@lang('turmas.professor_detach')", function(result) {
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
            
            var url = "{{ url('/unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id.'/diarios') }}";
            
            window.open(url + '/' + month, 'diarioPreview');
        }
    };
})();

$(document).ready(function() {
@if (isset($turma))

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
            <div role="tabpanel" class="tab-pane" id="aulas">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('aulas.data')</th>
                            <th class="text-center">@lang('aulas.status')</th>
                            <th class="text-center">@lang('aulas.aula_a_distancia')</th>
                            <th class="text-center">@lang('general.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($turma->aulas as $aula)
                        <tr data-data="{{ $aula->data->format('Y-m-d') }}">
                            <td scope="row">
                                <a href="{{ url('unidades_curriculares/' . 
                                                $unidadeCurricular->id . '/turmas/' .
                                                $turma->id.'/aulas/' . $aula->data->format('Y-m-d')) }}">
                                    {{ $aula->data->format('d/m/Y') }}
                                </a>
                            </td>
                            <td class="text-center">{{ $aula->status }}</td>
                            <td class="text-center">
                                @if ($aula->aula_a_distancia)
                                <i class="fa fa-check text-success"></i>
                                @else
                                <i class="fa fa-remove text-danger"></i>
                                @endif
                            </td>
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
            
            {{-- Aba de lista de alunos --}}
            <div role="tabpanel" class="tab-pane" id="alunos">
                @if (Auth::user()->can('edit-turma'))
                <div class="tab-actions">
                    <a id="vincularAlunoBtn" class="btn btn-primary attach" href="#alunos">
                        <i class="fa fa-chain"></i> @lang('alunos.attach')
                    </a>
                </div>
                
                @include('alunos.vincular_modal')
                @endif
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('alunos.matricula')</th>
                            <th>@lang('alunos.nome')</th>
                            <th>@lang('alunos.curso_origem')</th>
                            <th class="text-center">@lang('alunos.status')</th>
                            <th class="text-center">@lang('general.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alunos as $aluno)
                        <tr data-matricula="{{ $aluno->matricula }}" data-nome="{{ $aluno->nome }}"
                            data-status="{{ $aluno->status }}" data-curso_origem_id="{{ $aluno->curso_origem_id }}">
                            <td scope="row">{{ $aluno->matricula }}</td>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->curso_origem_sigla }}</td>

                            <td class="text-center">
                                @if ($aluno->status == App\Models\Aluno::STATUS_NORMAL)
                                <span class="label label-default">{{ $aluno->status }}</span>
                                @elseif ($aluno->status == App\Models\Aluno::STATUS_CANCELADO)
                                <span class="label label-danger">{{ $aluno->status }}</span>
                                @else
                                <span class="label label-warning">{{ $aluno->status }}</span>
                                @endif
                            </td>
                            
                            <td class="text-center">
                                @if (Auth::user()->can('edit-turma'))
                                <button class="btn btn-default btn-xs detach">
                                    <i class="fa fa-remove"></i> @lang('general.detach')
                                </button>
                                
                                <button class="btn btn-default btn-xs edit">
                                    <i class="fa fa-edit"></i> @lang('general.edit')
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{-- Aba de lista de professores --}}
            <div role="tabpanel" class="tab-pane" id="professores">
                @if (Auth::user()->can('edit-turma'))
                <div class="tab-actions">
                    <a id="vincularProfessorBtn" class="btn btn-primary attach" href="#professores">
                        <i class="fa fa-chain"></i> @lang('professores.attach')
                    </a>
                </div>
                
                @include('professores.vincular_modal')
                @endif
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('professores.matricula')</th>
                            <th>@lang('professores.nome')</th>
                            <th class="text-center">@lang('general.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($turma->professores as $p)
                        <tr data-matricula="{{ $p->usuario->matricula }}">
                            <td scope="row">{{ $p->usuario->matricula }}</td>
                            <td>{{ $p->usuario->nome }}</td>
                            <td class="text-center">
                                @if (Auth::user()->can('edit-turma'))
                                <button class="btn btn-default btn-xs detach">
                                    <i class="fa fa-remove"></i> @lang('general.detach')
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
            
            
            {{-- Aba de controle de faltas --}}
            <div role="tabpanel" class="tab-pane" id="controle-faltas">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>@lang('alunos.matricula')</th>
                            <th>@lang('alunos.nome')</th>
                            <th class="text-center">@lang('alunos.status')</th>
                            
                            @foreach ($periods as $date)
                            <th class="text-center">{{ $date['year']. '/' . $date['month'] }}</th>
                            @endforeach
                            
                            <th class="text-center">Total</th>
                            <th class="text-center">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faltas as $f)
                        <tr data-matricula="{{ $f->matricula }}">
                            <td scope="row">{{ $f->matricula }}</td>
                            <td>{{ $f->nome }}</td>
                            
                            <td class="text-center">
                                @if ($f->status == App\Models\Aluno::STATUS_NORMAL)
                                <span class="label label-default">{{ $f->status }}</span>
                                @elseif ($f->status == App\Models\Aluno::STATUS_CANCELADO)
                                <span class="label label-danger">{{ $f->status }}</span>
                                @else
                                <span class="label label-warning">{{ $f->status }}</span>
                                @endif
                            </td>
                            
                            {{-- total de faltas por mês --}}
                            @foreach ($periods as $date)
                            <td class="text-center">{{ $f->faltas[$date['key']]->total_faltas }}</td>
                            @endforeach
                            
                            {{-- total de faltas na turma --}}
                            <td class="text-center">{{ $f->total_faltas }}</td>
                            
                            {{-- porcentagem de faltas --}}
                            @if ($f->pFaltas > 25)
                            <td class="text-center text-danger">{{ number_format((float)$f->pFaltas, 1, '.', '') }}%</td>
                            @else
                            <td class="text-center">{{ number_format((float)$f->pFaltas, 1, '.', '') }}%</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
            
            
             {{-- Aba de diários --}}
            <div role="tabpanel" class="tab-pane" id="diarios">

                <div class="tab-actions">
                    <a id="closeDiarioBtn" class="btn btn-primary attach" href="#diarios">
                        <i class="fa fa-file-text"></i> @lang('diarios.close')
                    </a>
                    
                    <a class="btn btn-default attach pull-right" target="diarioClasseCompleto"
                       href="{{ url('/unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id.'/diarios') }}">
                        <i class="fa fa-file-text"></i> @lang('diarios.show_all')
                    </a>
                </div>
                
                @include('diarios.fechar_modal', ['months' => $diariosToClose])
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">@lang('diarios.month')</th>
                            <th>@lang('diarios.closed_by')</th>
                            <th>@lang('diarios.closed_at')</th>
                            <th class="text-center">@lang('diarios.archive')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($turma->statusDiarios as $d)
                        <tr data-id="{{ $d->id }}">
                            <td scope="row" class="text-center">{{ \Lang::get('months.'.$d->mes) }}</td>
                            <td>{{ $d->professor->usuario->nome }}</td>
                            <td>{{ $d->created_at }}</td>
                            <td class="text-center">
                                <a class="btn btn-danger btn-xs" target="diarioClasse"
                                   href="{{ url('/unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'
                                                .$turma->id.'/diarios/'.$d->mes) }}">
                                    <i class="fa fa-file-pdf-o"></i> Imprimir
                                </a>
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
