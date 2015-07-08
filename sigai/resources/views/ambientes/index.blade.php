@extends('app')
 
@section('title')
@choice('ambientes.title', 2) ::
@parent
@stop

@section('js')
<script id="ambiente-table-row" type="text/x-handlebars-template">
    @include('ambientes.table-row', ['raw' => true])
</script>

<script>

var Ambiente = (function() {
    var ambienteForm = new Form({
        nome             : {el: "#formAmbienteNome", required: true},
        tipo_ambiente_id : {el: "#formAmbienteTipo", required: true}
    });

    var tipoAmbienteForm = new Form({
        nome: {el: "#formTipoAmbienteNome", required: true}
    });
    
    var isEdit = false;
    var editAmbienteId = null;
    var editAmbienteRow = null;

    var Template = (function() {
        var ambienteTableRow = $("#ambiente-table-row").html();

        return {
            ambienteTableRow: Handlebars.compile(ambienteTableRow)
        }
    })();
    
    var Model = {
        getAmbiente: function(id, success, error) {
            $.ajax({
                url: Router.get('base') + "/" + id,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
    
        createAmbiente: function(data, success, error) {
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

        createTipoAmbiente: function(data, success, error) {
            $.ajax({
                url: Router.get('tipos_ambiente'),
                method: 'POST',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        updateAmbiente: function(id, data, success, error) {
            $.ajax({
                url: Router.get('base') + '/' + id,
                method: 'PUT',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        removeAmbiente: function(id, success, error) {
            $.ajax({
                url: Router.get('base') + '/' + id,
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
            $("#openNewAmbiente").click(this.onOpenNewAmbienteModal);
            $("#formAmbiente .save").click(this.onSaveAmbienteClick);
            $("#ambientes .remove").click(this.onRemoveAmbienteClick);
            $("#ambientes .edit").click(this.onEditAmbienteClick);
            
            $("#formAmbiente").on('hidden.bs.modal', this.onCloseAmbienteModal);


            // eventos para criar novo tipo de ambiente
            $("#openNewTipoAmbiente").click(this.onOpenNewTipoAmbienteModal)
            $("#formTipoAmbiente .save").click(this.onSaveTipoAmbienteClick);
        },
        
        // utilities -----------------------------------------------------------
        addAmbienteToTable: function(ambiente) {
            var html = Template.ambienteTableRow({
                ambiente: ambiente
            });
                     
            $("#ambientes tbody").append(html);
            $("#ambientes .remove").click(this.onRemoveAmbienteClick);
            $("#ambientes .edit").click(this.onEditAmbienteClick);
        },

        updateAmbienteToTable: function(ambiente, tr) {
            var html = Template.ambienteTableRow({
                ambiente: ambiente
            });

            $(tr).replaceWith(html);
            $("#ambientes .remove").click(this.onRemoveAmbienteClick);
            $("#ambientes .edit").click(this.onEditAmbienteClick);
        },

        setFormEditTitle: function(title) {
            title = Lang.get('general.edit') + ': ' + title;
            $("#formAmbienteLabel").html(title);
        },

        resetFormTitle: function() {
            $("#formAmbienteLabel").html(Lang.get('ambientes.new'));
        },

        addTipoAmbienteToList: function(tipo) {
            var html = '<option value='+tipo.id+' selected>'+tipo.nome+'</option>';
            $("#formAmbienteTipo").append(html);
        },
        
        // eventos -------------------------------------------------------------
        onOpenNewAmbienteModal: function() {
            isEdit = false;
            Ambiente.resetFormTitle();
            $("#formAmbiente").modal('show');
        },

        onOpenNewTipoAmbienteModal: function() {
            $("#formTipoAmbiente").modal('show');
        },
        
        onSaveAmbienteClick: function() {
            var data = ambienteForm.getValues();

            if (data.hasErrors) {
                ambienteForm.validate(data.errors);
                return;
            }
        
            if (isEdit) {
                Model.updateAmbiente(editAmbienteId, data.values, function(result) {
                    $("#formAmbiente").modal('hide');
                    Modal.success(result.message);
                    Ambiente.updateAmbienteToTable(result.ambiente, editAmbienteRow);
                }, function(json, xhr) {
                    if (xhr.status == 422)
                        ambienteForm.validate(json);
                    else
                        Modal.error(json.errors.join('<br>'));
                });
            } else {
                Model.createAmbiente(data.values, function(result) {
                    $("#formAmbiente").modal('hide');
                    Modal.success(result.message);
                    Ambiente.addAmbienteToTable(result.ambiente);
                }, function(json, xhr) {
                    if (xhr.status == 422)
                        ambienteForm.validate(json);
                    else
                        Modal.error(json.errors.join('<br>'));
                });
            }
        },

        onSaveTipoAmbienteClick: function() {
            var data = tipoAmbienteForm.getValues();

            if (data.hasErrors) {
                tipoAmbienteForm.validate(data.errors);
                return;
            }

            Model.createTipoAmbiente(data.values, function(result) {
                $("#formTipoAmbiente").modal('hide');
                Ambiente.addTipoAmbienteToList(result.tipo);
            }, function(json, xhr) {
                if (xhr.status == 422)
                    tipoAmbienteForm.validate(json);
                else
                    Modal.error(json.errors.join('<br>'));
            });
        },

        onRemoveAmbienteClick: function() {
            var tr = $(this).parent().parent();
            var id = $(tr).data('id');
            
            Modal.confirm(Lang.get('ambientes.remove_message'), function(result) {
                if (result == false) return;
                
                Model.removeAmbiente(id, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(json) {
                    Modal.error(json.errors.join('<br>'));
                });
            });
        },
        
        onCloseAmbienteModal: function(e) {
            ambienteForm.cleanValues();
        },
        
        onEditAmbienteClick: function() {
            editAmbienteRow = $($(this).parent().parent());
            editAmbienteId = editAmbienteRow.data('id');
            isEdit = true;

            Model.getAmbiente(editAmbienteId, function(result) {
                ambienteForm.setValues(result);
                Ambiente.setFormEditTitle(result.nome);
                $("#formAmbiente").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        }
    };    

    
    
})();

$(document).ready(function($) {
    Router.register('base', "{{ url('api/ambientes') }}");
    Router.register('tipos_ambiente', "{{ url('api/tipos_ambiente') }}");

    Lang.register('ambientes.remove_message', "@lang('ambientes.remove_message')");
    Lang.register('ambientes.new', "@lang('ambientes.new')");
    Lang.register('general.edit', "@lang('general.edit')");

    Ambiente.init();
});
</script>
@endsection

@section('content')
<div class="col-xs-12">

	@include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@choice('ambientes.title', 2)</li>
    </ol>
    
    <button type="button" class="btn btn-primary" id="openNewAmbiente">
        <i class="fa fa-plus"></i> @lang('ambientes.new')
    </button>
    
    @include('ambientes.criar_modal')
    @include('tipos_ambiente.criar_modal')
  
    <!-- Lista Ambientes -->
    <table class="table" id="ambientes">
        <thead>
            <tr>
                <th>@lang('ambientes.id')</th>
                <th>@lang('ambientes.nome')</th>
                <th>@choice('tipos_ambiente.title', 1)</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ambientes as $ambiente)
                @include('ambientes.table-row', ['ambiente' => $ambiente])
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-container text-center">
        <?php echo $ambientes->render(); ?>
    </div>
</div>
@endsection
