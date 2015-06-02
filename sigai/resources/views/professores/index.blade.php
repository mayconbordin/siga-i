@extends('app')
 
@section('title')
@choice('professores.title', 2) ::
@parent
@stop

@section('js')
<script>

var Professor = (function() {

    var baseUrl = "{{ url('api/professores') }}";

    var createProfessorForm = new Form({
        matricula    : {el: "#newProfessorMatricula"  , required: true},
        nome         : {el: "#newProfessorNome"       , required: true},
        curso_origem_id : {el: "#newProfessorCursoOrigem", required: true},
        email        : {el: "#newProfessorEmail"      , required: true},
        password     : {el: "#newProfessorPassword"   , required: true}
    });
    
    var updateProfessorForm = new Form({
        matricula    : {el: "#newProfessorMatricula"  , required: true},
        nome         : {el: "#newProfessorNome"       , required: true},
        curso_origem_id : {el: "#newProfessorCursoOrigem", required: true},
        email        : {el: "#newProfessorEmail"      , required: true},
        password     : {el: "#newProfessorPassword"   , required: false}
    });
    
    var isEdit = false;
    
    var Model = {
        getProfessor: function(matricula, success, error) {
            $.ajax({
                url: baseUrl + "/" + matricula,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
    
        createProfessor: function(data, success, error) {
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
        
        updateProfessor: function(data, success, error) {
            $.ajax({
                url: baseUrl + '/' + data.matricula,
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
            $("#openNewProfessor").click(this.onOpenNewProfessorModal);
            $("#newProfessor .save").click(this.onSaveProfessorClick);
            $("#professores .remove").click(this.onRemoveProfessorClick);
            $("#professores .edit").click(this.onEditProfessorClick);
            
            $("#newProfessor").on('hidden.bs.modal', this.onCloseProfessorModal);
        },
        
        // utilities -----------------------------------------------------------
        addProfessorToTable: function(p) {
            var html = '<tr data-matricula="'+p.matricula+'"><th scope="row">'
                     + p.matricula+'</th><td>'+p.nome+'</td><td>'+p.cursoOrigem.nome+'</td>'
                     + '<td class="text-center"><button class="btn btn-default btn-xs remove">'
                     + '<i class="fa fa-remove"></i> @lang("general.remove")</button>'
                     + '</td></tr>';
                     
            $("#professores tbody").append(html);
            $("#professores .remove").click(this.onRemoveProfessorClick);
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
                
                Model.updateProfessor(data.values, function(result) {
                    $("#newProfessor").modal('hide');
                    Modal.success(result.message);
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
            
            Modal.confirm("@lang('professores.remove_message')", function(result) {
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
            var tr = $(this).parent().parent();
            var matricula = $(tr).data('matricula');
            isEdit = true;
            
            Model.getProfessor(matricula, function(result) {
                console.log(result);
                
                updateProfessorForm.setValues(result);
                $("#newProfessor").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        },
    };    
    
})();

$(document).ready(function($) {
    Professor.init();
});
</script>
@endsection

@section('content')
<div class="col-xs-12">
	@include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@choice('professores.title', 2)</li>
    </ol>
    
    <button type="button" class="btn btn-primary" id="openNewProfessor">
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
                <th scope="row">{{ $p->usuario->matricula }}</th>
                <td>{{ $p->usuario->nome }}</td>
                <td>{{ $p->cursoOrigem->nome }}</td>
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
        <?php echo $professores->render(); ?>
    </div>
</div>
@endsection
