@extends('app')
 
@section('title')
@choice('dispositivos_usuario.title', 2) ::
@parent
@stop

@section('js')
<script id="dispositivo-table-row" type="text/x-handlebars-template">
    @include('dispositivos_usuario.table-row', ['raw' => true])
</script>

<script>

var Dispositivo = (function() {
    var dispositivoForm = new Form({
        codigo              : {el: "#formDispositivoCodigo", required: true},
        usuario_id          : {el: "#formDispositivoUsuarioId"  , required: true},
        tipo_dispositivo_id : {el: "#formDispositivoTipo"  , required: true},
        ambiente_id         : {el: "#formDispositivoAmbienteId", required: false}
    });

    var tipoDispositivoForm = new Form({
        nome: {el: "#formTipoDispositivoNome", required: true}
    });

    var isEdit = false;
    var editDispositivoId  = null;
    var editDispositivoRow = null;

    var Template = (function() {
        var dispositivoTableRow = $("#dispositivo-table-row").html();

        return {
            dispositivoTableRow: Handlebars.compile(dispositivoTableRow)
        }
    })();
    
    var Model = {
        getDispositivo: function(id, success, error) {
            $.ajax({
                url: Router.get('base') + "/" + id,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
    
        createDispositivo: function(data, success, error) {
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

        createTipoDispositivo: function(data, success, error) {
            $.ajax({
                url: Router.get('tipos_dispositivo'),
                method: 'POST',
                data: data
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
        
        updateDispositivo: function(id, data, success, error) {
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
        
        removeDispositivo: function(id, success, error) {
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
            $("#openNewDispositivo").click(this.onOpenNewDispositivoModal);
            $("#formDispositivo .save").click(this.onSaveDispositivoClick);
            $("#dispositivos .remove").click(this.onRemoveDispositivoClick);
            $("#dispositivos .edit").click(this.onEditDispositivoClick);
            $("#dispositivos .status").click(this.onStatusDispositivoClick);

            $("#formDispositivo").on('hidden.bs.modal', this.onCloseDispositivoModal);

            // eventos para criar novo tipo de dispositivo
            $("#openNewTipoDispositivo").click(this.onOpenNewTipoDispositivoModal)
            $("#formTipoDispositivo .save").click(this.onSaveTipoDispositivoClick);

            $("#formDispositivoUsuario").typeahead({
                onSelect: function(item) {
                    $("#formDispositivoUsuarioId").val(item.value);
                },
                ajax: {
                    url: Router.get('usuarios'),
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
        
        // utilities -----------------------------------------------------------
        addDispositivoToTable: function(dispositivo) {
            var html = Template.dispositivoTableRow({
                dispositivo: dispositivo
            });
                     
            $("#dispositivos tbody").append(html);
            $("#dispositivos .remove").click(this.onRemoveDispositivoClick);
            $("#dispositivos .edit").click(this.onEditDispositivoClick);
        },

        updateDispositivoToTable: function(dispositivo, tr) {
            var html = Template.dispositivoTableRow({
                dispositivo: dispositivo
            });

            $(tr).replaceWith(html);
            $("#dispositivos .remove").click(this.onRemoveDispositivoClick);
            $("#dispositivos .edit").click(this.onEditDispositivoClick);
        },

        setFormEditTitle: function(title) {
            title = Lang.get('general.edit') + ': ' + title;
            $("#formDispositivoLabel").html(title);
        },

        resetFormTitle: function() {
            $("#formDispositivoLabel").html(Lang.get('dispositivos.new'));
        },

        addTipoDispositivoToList: function(tipo) {
            var html = '<option value='+tipo.id+' selected>'+tipo.nome+'</option>';
            $("#formDispositivoTipo").append(html);
        },

        // eventos -------------------------------------------------------------
        onOpenNewDispositivoModal: function() {
            isEdit = false;
            Dispositivo.resetFormTitle();
            $("#formDispositivo").modal('show');
        },

        onOpenNewTipoDispositivoModal: function() {
            $("#formTipoDispositivo").modal('show');
        },
        
        onSaveDispositivoClick: function() {
            var data = dispositivoForm.getValues();

            if (data.hasErrors) {
                dispositivoForm.validate(data.errors);
                return;
            }

            var values = data.values;

            if (isEdit) {
                Model.updateDispositivo(editDispositivoId, values, function(result) {
                    $("#formDispositivo").modal('hide');
                    Modal.success(result.message);
                    Dispositivo.updateDispositivoToTable(result.dispositivo, editDispositivoRow);
                }, function(json, xhr) {
                    if (xhr.status == 422)
                        dispositivoForm.validate(json);
                    else
                        Modal.error(json.errors.join('<br>'));
                });
            } else {
                Model.createDispositivo(values, function(result) {
                    $("#formDispositivo").modal('hide');
                    Modal.success(result.message);
                    Dispositivo.addDispositivoToTable(result.dispositivo);
                }, function(json, xhr) {
                    if (xhr.status == 422)
                        dispositivoForm.validate(json);
                    else
                        Modal.error(json.errors.join('<br>'));
                });
            }
        },

        onSaveTipoDispositivoClick: function() {
            var data = tipoDispositivoForm.getValues();

            if (data.hasErrors) {
                tipoDispositivoForm.validate(data.errors);
                return;
            }

            Model.createTipoDispositivo(data.values, function(result) {
                $("#formTipoDispositivo").modal('hide');
                Dispositivo.addTipoDispositivoToList(result.tipo);
            }, function(json, xhr) {
                if (xhr.status == 422)
                    tipoDispositivoForm.validate(json);
                else
                    Modal.error(json.errors.join('<br>'));
            });
        },

        onRemoveDispositivoClick: function() {
            var tr = $(this).parent().parent();
            var id = $(tr).data('id');
            
            Modal.confirm(Lang.get('dispositivos.remove_message'), function(result) {
                if (result == false) return;
                
                Model.removeDispositivo(id, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(json) {
                    Modal.error(json.errors.join('<br>'));
                });
            });
        },
        
        onCloseDispositivoModal: function(e) {
            dispositivoForm.cleanValues();
        },
        
        onEditDispositivoClick: function() {
            editDispositivoRow = $($(this).parent().parent());
            editDispositivoId = editDispositivoRow.data('id');
            isEdit = true;

            Model.getDispositivo(editDispositivoId, function(result) {
                dispositivoForm.setValues(result);

                if (typeof(result.usuario) != "undefined") {
                    $("#formDispositivoUsuarioId").val(result.usuario.id);
                    $("#formDispositivoUsuario").val(result.usuario.nome);
                }

                Dispositivo.setFormEditTitle(result.id);
                $("#formDispositivo").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        }
    };
})();

$(document).ready(function($) {
    Router.register('base', "{{ url('api/dispositivos_usuario') }}");
    Router.register('tipos_dispositivo', "{{ url('api/tipos_dispositivo') }}");
    Router.register('usuarios', "{{ url('api/usuarios') }}");

    Lang.register('dispositivos.remove_message', "@lang('dispositivos_usuario.remove_message')");
    Lang.register('dispositivos.new', "@lang('dispositivos_usuario.new')");
    Lang.register('general.edit', "@lang('general.edit')");

    Dispositivo.init();
});
</script>
@endsection

@section('content')
<div class="col-xs-12">

	@include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@choice('dispositivos_usuario.title', 2)</li>
    </ol>
    
    <button type="button" class="btn btn-primary" id="openNewDispositivo">
        <i class="fa fa-plus"></i> @lang('dispositivos_usuario.new')
    </button>
    
    @include('dispositivos_usuario.criar_modal')
    @include('tipos_dispositivo.criar_modal')

    <!-- Lista Dispositivos -->
    <table class="table" id="dispositivos">
        <thead>
            <tr>
                <th>@lang('dispositivos_usuario.codigo')</th>
                <th class="text-center">@choice('tipos_dispositivo.title', 1)</th>
                <th>@choice('usuarios.title', 1)</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dispositivos as $dispositivo)
                @include('dispositivos_usuario.table-row', ['dispositivo' => $dispositivo])
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-container text-center">
        <?php echo $dispositivos->render(); ?>
    </div>
</div>
@endsection
