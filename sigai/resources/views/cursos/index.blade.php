@extends('app')
 
@section('title')
@choice('cursos.title', 2) ::
@parent
@stop

@section('js')
<script id="curso-table-row" type="text/x-handlebars-template">
    @include('cursos.table-row', ['raw' => true])
</script>

<script>

var Curso = (function() {

    var baseUrl = "{{ url('api/cursos') }}";

    var cursoForm = new Form({
        nome           : {el: "#newCursoNome"       , required: true},
        sigla          : {el: "#newCursoSigla"      , required: true},
        coordenador_matricula : {el: "#newCursoCoordenador", required: true}
    });
    
    var isEdit = false;
    var editCursoId = null;
    var editCursoRow = null;

    var Template = (function() {
        var cursoTableRow = $("#curso-table-row").html();

        return {
            cursoTableRow: Handlebars.compile(cursoTableRow)
        }
    })();
    
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
            data = Model.sanitizeCursoData(data);
            
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
            data = Model.sanitizeCursoData(data);
            
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
        },
        
        sanitizeCursoData: function(data) {
            data.coordenador_matricula = data.coordenador_matricula.split('|')[0].trim();
            return data;
        }
    };
    
    return {
        init: function() {
            $("#openNewCurso").click(this.onOpenNewCursoModal);
            $("#newCurso .save").click(this.onSaveCursoClick);
            $("#cursos .remove").click(this.onRemoveCursoClick);
            $("#cursos .edit").click(this.onEditCursoClick);
            
            $("#newCurso").on('hidden.bs.modal', this.onCloseCursoModal);
            
            $("#newCursoCoordenador").typeahead({
                onSelect: function(item) {

                },
                ajax: {
                    url: "{{ url('api/professores') }}",
                    displayField: "display_name",
                    valueField: "matricula",
                    method: "get",
                    preDispatch: function (query) {
                        return {
                            query: query
                        }
                    },
                }
            });
        },
        
        // utilities -----------------------------------------------------------
        addCursoToTable: function(curso) {
            var html = Template.cursoTableRow({
                curso: curso
            });
                     
            $("#cursos tbody").append(html);
            $("#cursos .remove").click(this.onRemoveCursoClick);
            $("#cursos .edit").click(this.onEditCursoClick);
        },

        updateCursoToTable: function(curso, tr) {
            var html = Template.cursoTableRow({
                curso: curso
            });

            $(tr).replaceWith(html);
            $("#cursos .remove").click(this.onRemoveCursoClick);
            $("#cursos .edit").click(this.onEditCursoClick);
        },
        
        // eventos -------------------------------------------------------------
        onOpenNewCursoModal: function() {
            isEdit = false;
            $("#newCurso").modal('show');
        },
        
        onSaveCursoClick: function() {
            var data = cursoForm.getValues();

            if (data.hasErrors) {
                console.log(data.errors);
                cursoForm.validate(data.errors);
                return;
            }
        
            if (isEdit) {
                Model.updateCurso(editCursoId, data.values, function(result) {
                    $("#newCurso").modal('hide');
                    Modal.success(result.message);
                    Curso.updateCursoToTable(result.curso, editCursoRow);
                }, function(errors) {
                    cursoForm.validate(errors);
                });
            } else {
                Model.createCurso(data.values, function(result) {
                    $("#newCurso").modal('hide');
                    Modal.success(result.message);
                    Curso.addCursoToTable(result.curso);
                }, function(errors) {
                    cursoForm.validate(errors);
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
            cursoForm.cleanValues();
        },
        
        onEditCursoClick: function() {
            editCursoRow = $($(this).parent().parent());
            var id = editCursoRow.data('id');
            isEdit = true;
            editCursoId = id;
            
            Model.getCurso(id, function(result) {
                result.coordenador_matricula = result.coordenador.display_name;
                cursoForm.setValues(result);
                $("#newCurso").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        },
    };    
    
})();

$(document).ready(function($) {
    Curso.init();
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
                <th>@lang('cursos.coordenador')</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                @include('cursos.table-row', ['curso' => $curso])
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-container text-center">
        <?php echo $cursos->render(); ?>
    </div>
</div>
@endsection
