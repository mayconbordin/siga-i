@extends('app')
 
@section('title')
@choice('alunos.title', 2) ::
@parent
@stop

@section('js')
<script id="aluno-table-row" type="text/x-handlebars-template">
    @include('alunos.table-row', ['raw' => true])
</script>

<script>

var Aluno = (function() {
    var createAlunoForm = new Form({
        matricula    : {el: "#newAlunoMatricula"  , required: true},
        nome         : {el: "#newAlunoNome"       , required: true},
        email        : {el: "#newAlunoEmail"      , required: true},
        password     : {el: "#newAlunoPassword"   , required: true}
    });
    
    var updateAlunoForm = new Form({
        matricula    : {el: "#newAlunoMatricula"  , required: true},
        nome         : {el: "#newAlunoNome"       , required: true},
        email        : {el: "#newAlunoEmail"      , required: true},
        password     : {el: "#newAlunoPassword"   , required: false}
    });
    
    var isEdit = false;
    var editMatricula = null;
    var editAlunoRow = null;

    var Template = (function() {
        var alunoTableRow = $("#aluno-table-row").html();

        return {
            alunoTableRow: Handlebars.compile(alunoTableRow)
        }
    })();
    
    var Model = {
        getAluno: function(matricula, success, error) {
            $.ajax({
                url: Router.get('base') + "/" + matricula,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
    
        createAluno: function(data, success, error) {
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
        
        updateAluno: function(matricula, data, success, error) {
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
        
        removeAluno: function(matricula, success, error) {
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
            $("#openNewAluno").click(this.onOpenNewAlunoModal);
            $("#newAluno .save").click(this.onSaveAlunoClick);
            $("#alunos .remove").click(this.onRemoveAlunoClick);
            $("#alunos .edit").click(this.onEditAlunoClick);
            
            $("#newAluno").on('hidden.bs.modal', this.onCloseAlunoModal);
        },
        
        // utilities -----------------------------------------------------------
        addAlunoToTable: function(aluno) {
            var html = Template.alunoTableRow({
                aluno: aluno
            });
                     
            $("#alunos tbody").append(html);
            $("#alunos .remove").click(this.onRemoveAlunoClick);
            $("#alunos .edit").click(this.onEditAlunoClick);
        },

        updateAlunoToTable: function(aluno, tr) {
            var html = Template.alunoTableRow({
                aluno: aluno
            });

            $(tr).replaceWith(html);

            $("#alunos .remove").click(this.onRemoveAlunoClick);
            $("#alunos .edit").click(this.onEditAlunoClick);
        },
        
        // eventos -------------------------------------------------------------
        onOpenNewAlunoModal: function() {
            isEdit = false;
            $("#newAluno").modal('show');
        },
        
        onSaveAlunoClick: function() {
            if (isEdit) {
                var data = updateAlunoForm.getValues();

                if (data.hasErrors) {
                    console.log(data.errors);
                    updateAlunoForm.validate(data.errors);
                    return;
                }
                
                Model.updateAluno(editMatricula, data.values, function(result) {
                    $("#newAluno").modal('hide');
                    Modal.success(result.message);
                    Aluno.updateAlunoToTable(result.aluno, editAlunoRow);
                }, function(errors) {
                    updateAlunoForm.validate(errors);
                });
            } else {
                var data = createAlunoForm.getValues();

                if (data.hasErrors) {
                    createAlunoForm.validate(data.errors);
                    return;
                }
                
                Model.createAluno(data.values, function(result) {
                    $("#newAluno").modal('hide');
                    Modal.success(result.message);
                    Aluno.addAlunoToTable(result.aluno);
                }, function(errors) {
                    createAlunoForm.validate(errors);
                });
            }
        },
        
        
        onRemoveAlunoClick: function() {
            var tr = $(this).parent().parent();
            var matricula = $(tr).data('matricula');
            
            Modal.confirm(Lang.get('alunos.remove_message'), function(result) {
                if (result == false) return;
                
                Model.removeAluno(matricula, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(r) {
                    Modal.error(r.errors.join('<br>'));
                });
            });
        },
        
        onCloseAlunoModal: function(e) {
            createAlunoForm.cleanValues();
        },
        
        onEditAlunoClick: function() {
            editAlunoRow = $($(this).parent().parent());
            editMatricula = editAlunoRow.data('matricula');
            isEdit = true;
            
            Model.getAluno(editMatricula, function(result) {
                console.log(result);
                
                updateAlunoForm.setValues(result);
                $("#newAluno").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        }
    };    
    
})();

$(document).ready(function($) {
    Lang.register('alunos.remove_message', "@lang('alunos.remove_message')");
    Router.register('base', "{{ url('api/alunos') }}");
    Aluno.init();
});

$(document).ready(function($) {
      
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
<div  data-step="1" data-intro= "@lang('help.painelAluno')" class="col-xs-12">
	@include('utils.alerts')
	
	  <button id="startHelp" class="help-button btn btn-large btn-success pull-right">
        <i class="fa fa-question-circle"></i> Ajuda
    </button>
    
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@choice('alunos.title', 2)</li>
    </ol>
    
    <button data-step="6" data-intro= "@lang('help.novoAluno')" type="button" class="btn btn-primary" id="openNewAluno">
        <i class="fa fa-plus"></i> @lang('alunos.new')
    </button>
    
    @include('alunos.criar_modal')
 
    <!-- Lista Alunos -->
    <table class="table" id="alunos">
        <thead>
            <tr>
                <th data-step="2" data-intro= "@lang('help.matricula')" > @lang('alunos.matricula')</th>
                <th data-step="3" data-intro= "@lang('help.nome')" > @lang('alunos.nome')</th>
                <th data-step="4" data-intro= "@lang('help.acoes')"class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                @include('alunos.table-row', ['aluno' => $aluno])
            @endforeach
        </tbody>
    </table>
    
    <div data-step="5" data-intro= "@lang('help.paginacao')" class="pagination-container text-center">
        <?php echo $alunos->render(); ?>
    </div>
</div>
@endsection
