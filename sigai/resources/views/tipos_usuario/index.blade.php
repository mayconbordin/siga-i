@extends('app')
 
@section('title')
@choice('tipos_usuario.title', 2) ::
@parent
@stop

@section('js')
<script id="tipo_usuario-table-row" type="text/x-handlebars-template">
    @include('tipos_usuario.table-row', ['raw' => true])
</script>
<script id="permission-item" type="text/x-handlebars-template">
    @include('tipos_usuario.permission-item', ['raw' => true])
</script>

<script>

var TipoUsuario = (function() {
    var tipoUsuarioForm = new Form({
        name         : {el: "#formTipoUsuarioName", required: true},
        display_name : {el: "#formTipoUsuarioDisplayName", required: false},
        description  : {el: "#formTipoUsuarioDescription", required: false}
    });
    
    var isEdit = false;
    var editTipoUsuarioId = null;
    var editTipoUsuarioRow = null;

    var Template = (function() {
        var tipoUsuarioTableRow = $("#tipo_usuario-table-row").html();
        var permissionItem = $("#permission-item").html();

        return {
            tipoUsuarioTableRow: Handlebars.compile(tipoUsuarioTableRow),
            permissionItem: Handlebars.compile(permissionItem)
        }
    })();
    
    var Model = {
        getTipoUsuario: function(id, success, error) {
            $.ajax({
                url: Router.get('base') + "/" + id,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
    
        createTipoUsuario: function(data, success, error) {
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
        
        updateTipoUsuario: function(id, data, success, error) {
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
        
        removeTipoUsuario: function(id, success, error) {
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
            $("#openNewTipoUsuario").click(this.onOpenNewTipoUsuarioModal);
            $("#formTipoUsuario .save").click(this.onSaveTipoUsuarioClick);
            $("#tipos_usuario .remove").click(this.onRemoveTipoUsuarioClick);
            $("#tipos_usuario .edit").click(this.onEditTipoUsuarioClick);
            $('#formTipoUsuarioName').on('input', this.onTipoUsuarioNameChange);
            
            $("#formTipoUsuario").on('hidden.bs.modal', this.onCloseTipoUsuarioModal);

            $("#addPermissaoTipoUsuario").click(this.onAddPermissaoClick);
            $("#permissoesDispositivo button.detach").click(this.onDetachPermissaoClick);
        },
        
        // utilities -----------------------------------------------------------
        addTipoUsuarioToTable: function(tipo_usuario) {
            var html = Template.tipoUsuarioTableRow({
                tipo: tipo_usuario
            });
                     
            $("#tipos_usuario tbody").append(html);
            $("#tipos_usuario .remove").click(this.onRemoveTipoUsuarioClick);
            $("#tipos_usuario .edit").click(this.onEditTipoUsuarioClick);
        },

        updateTipoUsuarioToTable: function(tipo_usuario, tr) {
            var html = Template.tipoUsuarioTableRow({
                tipo: tipo_usuario
            });

            $(tr).replaceWith(html);
            $("#tipos_usuario .remove").click(this.onRemoveTipoUsuarioClick);
            $("#tipos_usuario .edit").click(this.onEditTipoUsuarioClick);
        },

        setFormEditTitle: function(title) {
            title = Lang.get('general.edit') + ': ' + title;
            $("#formTipoUsuarioLabel").html(title);
        },

        resetFormTitle: function() {
            $("#formTipoUsuarioLabel").html(Lang.get('tipos_usuario.new'));
        },

        addPermissionTipoUsuarioToList: function(permission) {
            var html = $(Template.permissionItem({
                permission: permission
            }));

            html.find('.detach').click(this.onDetachPermissaoClick);
            $("#permissoesTipoUsuario ul").append(html);
        },

        addPermissionsTipoUsuarioToList: function(permissions) {
            for(var i=0; i<permissions.length; i++) {
                TipoUsuario.addPermissionTipoUsuarioToList(permissions[i]);
            }
        },

        // eventos -------------------------------------------------------------
        onOpenNewTipoUsuarioModal: function() {
            isEdit = false;
            TipoUsuario.resetFormTitle();
            $("#formTipoUsuario").modal('show');
        },
        
        onSaveTipoUsuarioClick: function() {
            var data = tipoUsuarioForm.getValues();

            if (data.hasErrors) {
                tipoUsuarioForm.validate(data.errors);
                return;
            }

            var values = data.values;
            values.permissions = TipoUsuario.getPermissionsFromList();
        
            if (isEdit) {
                Model.updateTipoUsuario(editTipoUsuarioId, data.values, function(result) {
                    $("#formTipoUsuario").modal('hide');
                    Modal.success(result.message);
                    TipoUsuario.updateTipoUsuarioToTable(result.tipo_usuario, editTipoUsuarioRow);
                }, function(json, xhr) {
                    if (xhr.status == 422)
                        tipoUsuarioForm.validate(json);
                    else
                        Modal.error(json.errors.join('<br>'));
                });
            } else {
                Model.createTipoUsuario(data.values, function(result) {
                    $("#formTipoUsuario").modal('hide');
                    Modal.success(result.message);
                    TipoUsuario.addTipoUsuarioToTable(result.tipo_usuario);
                }, function(json, xhr) {
                    if (xhr.status == 422)
                        tipoUsuarioForm.validate(json);
                    else
                        Modal.error(json.errors.join('<br>'));
                });
            }
        },

        onRemoveTipoUsuarioClick: function() {
            var tr = $(this).parent().parent();
            var id = $(tr).data('id');
            
            Modal.confirm(Lang.get('tipos_usuario.remove_message'), function(result) {
                if (result == false) return;
                
                Model.removeTipoUsuario(id, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(json) {
                    Modal.error(json.errors.join('<br>'));
                });
            });
        },
        
        onCloseTipoUsuarioModal: function(e) {
            tipoUsuarioForm.cleanValues();
            $("#formTipoUsuarioPermissao").val('');
            $("#permissoesTipoUsuario ul").html('');
        },
        
        onEditTipoUsuarioClick: function() {
            editTipoUsuarioRow = $($(this).parent().parent());
            editTipoUsuarioId = editTipoUsuarioRow.data('id');
            isEdit = true;

            Model.getTipoUsuario(editTipoUsuarioId, function(result) {
                tipoUsuarioForm.setValues(result);

                TipoUsuario.addPermissionsTipoUsuarioToList(result.permissions);

                TipoUsuario.setFormEditTitle(result.name);
                $("#formTipoUsuario").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        },

        onDetachPermissaoClick: function() {
            $(this).parent().remove();
        },

        permissionExists: function(id) {
            var items = $("#permissoesTipoUsuario ul li");

            for (var i=0; i<items.length; i++) {
                var data = $(items[i]).data();
                if (data.id == id) return true;
            }

            return false;
        },

        getPermissionsFromList: function() {
            var items = $("#permissoesTipoUsuario ul li");
            var scopes = [];

            for (var i=0; i<items.length; i++) {
                var data = $(items[i]).data();
                scopes.push(data.id);
            }

            return scopes;
        },

        onAddPermissaoClick: function() {
            var raw = $("#formTipoUsuarioPermissao").val();
            var data = raw.split('|');

            if (!TipoUsuario.permissionExists(data[0])) {
                TipoUsuario.addPermissionTipoUsuarioToList({id: data[0], name: data[1]});
            }
        },

        onTipoUsuarioNameChange: function() {
            var value = $('#formTipoUsuarioName').val();
            value = value.charAt(0).toUpperCase() + value.slice(1);
            $('#formTipoUsuarioDisplayName').val(value);
        }
    };    

    
    
})();

$(document).ready(function($) {
    Router.register('base', "{{ url('api/tipos_usuario') }}");

    Lang.register('tipos_usuario.remove_message', "@lang('tipos_usuario.remove_message')");
    Lang.register('tipos_usuario.new', "@lang('tipos_usuario.new')");
    Lang.register('general.edit', "@lang('general.edit')");

    TipoUsuario.init();
});
</script>
@endsection

@section('content')
<div class="col-xs-12">

	@include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@choice('tipos_usuario.title', 2)</li>
    </ol>
    
    <button type="button" class="btn btn-primary" id="openNewTipoUsuario">
        <i class="fa fa-plus"></i> @lang('tipos_usuario.new')
    </button>
    
    @include('tipos_usuario.criar_modal')

    <!-- Lista TiposUsuario -->
    <table class="table" id="tipos_usuario">
        <thead>
            <tr>
                <th>@lang('tipos_usuario.id')</th>
                <th>@lang('tipos_usuario.display_name')</th>
                <th>@lang('tipos_usuario.name')</th>
                <th>@lang('tipos_usuario.description')</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipos as $tipo)
                @include('tipos_usuario.table-row', ['tipo' => $tipo])
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-container text-center">
        <?php echo $tipos->render(); ?>
    </div>
</div>
@endsection
