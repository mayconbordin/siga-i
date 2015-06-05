@extends('app')
 
@section('title')
@choice('cursos.title', 2) ::
@parent
@stop

@section('js')
<script>

var Aluno = (function() {

    var baseUrl = "{{ url('api/cursos') }}";

    var createCursoForm = new Form({
        nome         : {el: "#newCursoNome"       , required: true},
        sigla        : {el: "#newCursoSigla"      , required: true},
    });
    
    var updateCursoForm = new Form({
        nome         : {el: "#newCursoNome"       , required: true},
        sigla        : {el: "#newCursoSigla"      , required: true}
    });
    
    var isEdit = false;
    var editCursoId = null;
    
    var Model = {
        getCurso: function(id, success, error) {
            $.ajax({
                url: baseUrl + "/" + id,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
    
        createCurso: function(data, success, error) {
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
        
        updateCurso: function(id, data, success, error) {
            $.ajax({
                url: baseUrl + '/' + id,
                method: 'PUT',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        removeCurso: function(id, success, error) {
            $.ajax({
                url: baseUrl + '/' + id,
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
            $("#openNewCurso").click(this.onOpenNewAlunoModal);
            $("#newCurso .save").click(this.onSaveCursoClick);
            $("#cursos .remove").click(this.onRemoveCursoClick);
            $("#cursos .edit").click(this.onEditCursoClick);
            
            $("#newCurso").on('hidden.bs.modal', this.onCloseCursoModal);
        },
        
        // utilities -----------------------------------------------------------
        addCursoToTable: function(curso) {
            var html = '<tr data-id="'+curso.id+'"><th scope="row">'
                     + curso.id+'</th><td>'+curso.nome+'</td><td>'+curso.sigla+'</td>'
                     + '<td class="text-center"><button class="btn btn-default btn-xs edit">'
                     + '<i class="fa fa-pencil-square-o"></i> @lang("general.edit")'
                     + '</button><button class="btn btn-danger btn-xs remove">'
                     + '<i class="fa fa-remove"></i> @lang("general.remove")</button>'
                     + '</td></tr>';
                     
            $("#cursos tbody").append(html);
            $("#cursos .remove").click(this.onRemoveCursoClick);
            $("#cursos .edit").click(this.onEditCursoClick);
        },
        
        // eventos -------------------------------------------------------------
        onOpenNewAlunoModal: function() {
            isEdit = false;
            $("#newCurso").modal('show');
        },
        
        onSaveCursoClick: function() {
        
            if (isEdit) {
                var data = updateCursoForm.getValues();

                if (data.hasErrors) {
                    console.log(data.errors);
                    updateCursoForm.validate(data.errors);
                    return;
                }
                
                Model.updateCurso(editCursoId, data.values, function(result) {
                    $("#newCurso").modal('hide');
                    Modal.success(result.message);
                }, function(errors) {
                    updateCursoForm.validate(errors);
                });
            } else {
                var data = createCursoForm.getValues();

                if (data.hasErrors) {
                    createCursoForm.validate(data.errors);
                    return;
                }
                
                Model.createCurso(data.values, function(result) {
                    $("#newCurso").modal('hide');
                    Modal.success(result.message);
                    Aluno.addCursoToTable(result.curso);
                }, function(errors) {
                    createCursoForm.validate(errors);
                });
            }
        },
        
        
        onRemoveCursoClick: function() {
            var tr = $(this).parent().parent();
            var id = $(tr).data('id');
            
            Modal.confirm("@lang('cursos.remove_message')", function(result) {
                if (result == false) return;
                
                Model.removeCurso(id, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(r) {
                    Modal.error(r.errors.join('<br>'));
                });
            });
        },
        
        onCloseCursoModal: function(e) {
            createCursoForm.cleanValues();
        },
        
        onEditCursoClick: function() {
            var tr = $(this).parent().parent();
            var id = $(tr).data('id');
            isEdit = true;
            editCursoId = id;
            
            Model.getCurso(id, function(result) {
                console.log(result);
                
                updateCursoForm.setValues(result);
                $("#newCurso").modal('show');
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
        <li class="active">@choice('cursos.title', 2)</li>
    </ol>
    
    <button type="button" class="btn btn-primary" id="openNewCurso">
        <i class="fa fa-plus"></i> @lang('cursos.new')
    </button>
    
    @include('cursos.criar_modal')
  
    <!-- Lista Cursos -->
    <table class="table" id="cursos">
        <thead>
            <tr>
                <th>@lang('cursos.id')</th>
                <th>@lang('cursos.nome')</th>
                <th>@lang('cursos.sigla')</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr data-id="{{ $curso->id }}">
                <th scope="row">{{ $curso->id }}</th>
                <td>{{ $curso->nome }}</td>
                <td>{{ $curso->sigla }}</td>
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
        <?php echo $cursos->render(); ?>
    </div>
</div>
@endsection
