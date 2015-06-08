@extends('app')
 
@section('title')
@choice('alunos.title', 2) ::
@parent
@stop

@section('js')
<script>

var Aluno = (function() {

    var baseUrl = "{{ url('api/alunos') }}";

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
    
    var Model = {
        getAluno: function(matricula, success, error) {
            $.ajax({
                url: baseUrl + "/" + matricula,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
    
        createAluno: function(data, success, error) {
            $.ajax({
                url: baseUrl,
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
                url: baseUrl + '/' + matricula,
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
                url: baseUrl + '/' + matricula,
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
        addAlunoToTable: function(p) {
            var html = '<tr data-matricula="'+p.matricula+'"><th scope="row">'
                     + p.matricula+'</th><td>'+p.nome+'</td>'
                     + '<td class="text-center"><button class="btn btn-default btn-xs edit">'
                     + '<i class="fa fa-pencil-square-o"></i> @lang("general.edit")'
                     + '</button><button class="btn btn-default btn-xs remove">'
                     + '<i class="fa fa-remove"></i> @lang("general.remove")</button>'
                     + '</td></tr>';
                     
            $("#alunos tbody").append(html);
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
            
            Modal.confirm("@lang('alunos.remove_message')", function(result) {
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
            var tr = $(this).parent().parent();
            editMatricula = $(tr).data('matricula');
            isEdit = true;
            
            Model.getAluno(editMatricula, function(result) {
                console.log(result);
                
                updateAlunoForm.setValues(result);
                $("#newAluno").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        },
    };    
    
})();

$(document).ready(function($) {
    Aluno.init();
});
</script>
@endsection

@section('content')
<div class="col-xs-12">
	@include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@choice('alunos.title', 2)</li>
    </ol>
    
    <button type="button" class="btn btn-primary" id="openNewAluno">
        <i class="fa fa-plus"></i> @lang('alunos.new')
    </button>
    
    @include('alunos.criar_modal')
  
    <!-- Lista Alunos -->
    <table class="table" id="alunos">
        <thead>
            <tr>
                <th>@lang('alunos.matricula')</th>
                <th>@lang('alunos.nome')</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr data-matricula="{{ $aluno->usuario->matricula }}">
                <th scope="row">{{ $aluno->usuario->matricula }}</th>
                <td>{{ $aluno->usuario->nome }}</td>
                <td class="text-center">
                    <button class="btn btn-default btn-xs edit">
                        <i class="fa fa-pencil-square-o"></i> @lang('general.edit')
                    </button>
                    
                    <button class="btn btn-danger btn-xs remove">
                        <i class="fa fa-remove"></i> @lang('general.remove')
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-container text-center">
        <?php echo $alunos->render(); ?>
    </div>
</div>
@endsection
