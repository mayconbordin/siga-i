@extends('app')
 
@section('title')
@choice('professores.title', 2) ::
@parent
@stop

@section('js')
<script id="professor-table-row" type="text/x-handlebars-template">
    @include('professores.table-row', ['raw' => true])
</script>

<script>
var Professor = (function() {
    var createProfessorForm = new Form({
        matricula       : {el: "#newProfessorMatricula"  , required: true},
        nome            : {el: "#newProfessorNome"       , required: true},
        curso_origem_id : {el: "#newProfessorCursoOrigem", required: true},
        email           : {el: "#newProfessorEmail"      , required: true},
        password        : {el: "#newProfessorPassword"   , required: true}
    });
    
    var updateProfessorForm = new Form({
        matricula       : {el: "#newProfessorMatricula"  , required: true},
        nome            : {el: "#newProfessorNome"       , required: true},
        curso_origem_id : {el: "#newProfessorCursoOrigem", required: true},
        email           : {el: "#newProfessorEmail"      , required: true},
        password        : {el: "#newProfessorPassword"   , required: false}
    });
    
    var isEdit = false;
    var editMatricula = null;
    var editProfessorRow = null;

    var Template = (function() {
        var professorTableRow = $("#professor-table-row").html();

        return {
            professorTableRow: Handlebars.compile(professorTableRow)
        }
    })();
    
    var Model = {
        getProfessor: function(matricula, success, error) {
            $.ajax({
                url: Router.get('base') + "/" + matricula,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
    
        createProfessor: function(data, success, error) {
            $.ajax({
                url: Router.get('base'),
                method: 'POST',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        updateProfessor: function(matricula, data, success, error) {
            $.ajax({
                url: Router.get('base') + '/' + matricula,
                method: 'PUT',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        removeProfessor: function(matricula, success, error) {
            $.ajax({
                url: Router.get('base') + '/' + matricula,
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
            $("#openNewProfessor").click(this.onOpenNewProfessorModal);
            $("#newProfessor .save").click(this.onSaveProfessorClick);
            $("#professores .remove").click(this.onRemoveProfessorClick);
            $("#professores .edit").click(this.onEditProfessorClick);
            
            $("#newProfessor").on('hidden.bs.modal', this.onCloseProfessorModal);
        },
        
        // utilities -----------------------------------------------------------
        addProfessorToTable: function(professor) {
            var html = Template.professorTableRow({
                professor: professor
            });
                     
            $("#professores tbody").append(html);
            $("#professores .remove").click(this.onRemoveProfessorClick);
            $("#professores .edit").click(this.onEditProfessorClick);
        },

        updateProfessorToTable: function(professor, tr) {
            var html = Template.professorTableRow({
                professor: professor
            });

            $(tr).replaceWith(html);
            $("#professores .remove").click(this.onRemoveProfessorClick);
            $("#professores .edit").click(this.onEditProfessorClick);
        },
        
        // eventos -------------------------------------------------------------
        onOpenNewProfessorModal: function() {
            isEdit = false;
            $("#newProfessor").modal('show');
        },
        
        onSaveProfessorClick: function() {
            if (isEdit) {
                var data = updateProfessorForm.getValues();

                if (data.hasErrors) {
                    updateProfessorForm.validate(data.errors);
                    return;
                }
                
                Model.updateProfessor(editMatricula, data.values, function(result) {
                    $("#newProfessor").modal('hide');
                    Modal.success(result.message);
                    Professor.updateProfessorToTable(result.professor, editProfessorRow);
                }, function(errors) {
                    updateProfessorForm.validate(errors);
                });
            } else {
                var data = createProfessorForm.getValues();

                if (data.hasErrors) {
                    createProfessorForm.validate(data.errors);
                    return;
                }
                
                Model.createProfessor(data.values, function(result) {
                    $("#newProfessor").modal('hide');
                    Modal.success(result.message);
                    Professor.addProfessorToTable(result.professor);
                }, function(errors) {
                    createProfessorForm.validate(errors);
                });
            }
        },

        onRemoveProfessorClick: function() {
            var tr = $(this).parent().parent();
            var matricula = $(tr).data('matricula');
            
            Modal.confirm(Lang.get('professores.remove_message'), function(result) {
                if (result == false) return;
                
                Model.removeProfessor(matricula, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(r) {
                    Modal.error(r.errors.join('<br>'));
                });
            });
        },
        
        onCloseProfessorModal: function(e) {
            createProfessorForm.cleanValues();
        },
        
        onEditProfessorClick: function() {
            editProfessorRow = $($(this).parent().parent());
            editMatricula = editProfessorRow.data('matricula');
            isEdit = true;
            
            Model.getProfessor(editMatricula, function(result) {
                console.log(result);
                
                updateProfessorForm.setValues(result);
                $("#newProfessor").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        }
    };    
    
})();

$(document).ready(function($) {
    Router.register('base', "{{ url('api/professores') }}");
    Lang.register('professores.remove_message', "@lang('professores.remove_message')");

    Professor.init();

    var intro = introJs();
    intro.setOptions({
        skipLabel: '@lang("help.skipLabel")',
        nextLabel: '@lang("help.nextLabel")',
        prevLabel: '@lang("help.prevLabel")',
        doneLabel: '@lang("help.doneLabel")',
        
        showProgress: true
    });
   
    $("#startHelp").click(function() {
        intro.start();
    });
});
</script>
@endsection

@section('content')
<div data-step="1" data-intro="@lang('help.consultarProf')" class="col-xs-12">

    <button id="startHelp" class="help-button btn btn-large btn-success pull-right">
        <i class="fa fa-question-circle"></i> @lang('help.title')
    </button>

    @include('utils.alerts')

    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@choice('professores.title', 2)</li>
    </ol>
    
    <button data-step="4" data-intro="@lang('help.novoProf')" type="button" class="btn btn-primary" id="openNewProfessor">
        <i class="fa fa-plus"></i> @lang('professores.new')
    </button>
    
    @include('professores.criar_modal')
  
    {{-- Lista de Professores --}}
    <table class="table" id="professores">
        <thead>
            <tr>
                <th>@lang('professores.matricula')</th>
                <th>@lang('professores.nome')</th>
                <th>@lang('professores.curso_origem')</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professores as $p)
            <tr data-matricula="{{ $p->usuario->matricula }}">
                <td scope="row">{{ $p->usuario->matricula }}</td>
                <td>{{ $p->usuario->nome }}</td>
                <td>{{ $p->cursoOrigem->nome }}</td>
                <td class="text-center">
                    <button data-step="2" data-intro="@lang('help.alterarProf')" class="btn btn-default btn-xs edit">
                        <i class="fa fa-pencil-square-o"></i> @lang('general.edit')
                    </button>
                    
                    <button data-step="3" data-intro="@lang('help.removerProf')" class="btn btn-danger btn-xs remove">
                        <i class="fa fa-remove"></i> @lang('general.remove')
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div  class="pagination-container text-center">
        <?php echo $professores->render(); ?>
    </div>
</div>
@endsection
