@extends('app')
 
@section('title')
@choice('usuarios.title', 2) ::
@parent
@stop

@section('js')
<script id="usuario-table-row" type="text/x-handlebars-template">
    @include('usuario.table-row', ['raw' => true])
</script>
<script id="role-item" type="text/x-handlebars-template">
    @include('usuario.role-item', ['raw' => true])
</script>

<script>

var Usuario = (function() {
    var createUsuarioForm = new Form({
        matricula    : {el: "#newUsuarioMatricula"  , required: true},
        nome         : {el: "#newUsuarioNome"       , required: true},
        email        : {el: "#newUsuarioEmail"      , required: true},
        password     : {el: "#newUsuarioPassword"   , required: true}
    });
    
    var updateUsuarioForm = new Form({
        matricula    : {el: "#newUsuarioMatricula"  , required: true},
        nome         : {el: "#newUsuarioNome"       , required: true},
        email        : {el: "#newUsuarioEmail"      , required: true},
        password     : {el: "#newUsuarioPassword"   , required: false}
    });
    
    var isEdit = false;
    var editId = null;
    var editUsuarioRow = null;

    var Template = (function() {
        var usuarioTableRow = $("#usuario-table-row").html();
        var roleItem = $("#role-item").html();

        return {
            usuarioTableRow: Handlebars.compile(usuarioTableRow),
            roleItem: Handlebars.compile(roleItem)
        }
    })();
    
    var Model = {
        getUsuario: function(id, success, error) {
            $.ajax({
                url: Router.get('base') + "/" + id,
                method: 'GET'
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        },
    
        createUsuario: function(data, success, error) {
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
        
        updateUsuario: function(id, data, success, error) {
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
        
        removeUsuario: function(id, success, error) {
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
            $("#openNewUsuario").click(this.onOpenNewUsuarioModal);
            $("#newUsuario .save").click(this.onSaveUsuarioClick);
            $("#usuarios .remove").click(this.onRemoveUsuarioClick);
            $("#usuarios .edit").click(this.onEditUsuarioClick);
            
            $("#newUsuario").on('hidden.bs.modal', this.onCloseUsuarioModal);

            $("#addTipoUsuario").click(this.onAddRoleClick);
            $("#tiposUsuario button.detach").click(this.onDetachRoleClick);
        },
        
        // utilities -----------------------------------------------------------
        addUsuarioToTable: function(usuario) {
            var html = $(Template.usuarioTableRow({
                usuario: usuario
            }));

            html.find('.remove').click(this.onRemoveUsuarioClick);
            html.find('.edit').click(this.onEditUsuarioClick);

            $("#usuarios tbody").append(html);
        },

        updateUsuarioToTable: function(usuario, tr) {
            var html = $(Template.usuarioTableRow({
                usuario: usuario
            }));

            html.find('.remove').click(this.onRemoveUsuarioClick);
            html.find('.edit').click(this.onEditUsuarioClick);

            $(tr).replaceWith(html);
        },

        setFormEditTitle: function(title) {
            title = Lang.get('general.edit') + ': ' + title;
            $("#newUsuarioLabel").html(title);
        },

        resetFormTitle: function() {
            $("#newUsuarioLabel").html(Lang.get('usuarios.new'));
        },

        addRoleToList: function(role) {
            var html = $(Template.roleItem({
                role: role
            }));

            html.find('.detach').click(this.onDetachRoleClick);
            $("#tiposUsuario ul").append(html);
        },

        addRolesToList: function(roles) {
            for(var i=0; i<roles.length; i++) {
                Usuario.addRoleToList(roles[i]);
            }
        },
        
        // eventos -------------------------------------------------------------
        onOpenNewUsuarioModal: function() {
            isEdit = false;
            Usuario.resetFormTitle();
            $("#newUsuario").modal('show');
        },
        
        onSaveUsuarioClick: function() {
            if (isEdit) {
                var data = updateUsuarioForm.getValues();

                if (data.hasErrors) {
                    console.log(data.errors);
                    updateUsuarioForm.validate(data.errors);
                    return;
                }

                var values = data.values;
                values.roles = Usuario.getRolesFromList();
                
                Model.updateUsuario(editId, values, function(result) {
                    $("#newUsuario").modal('hide');
                    Modal.success(result.message);
                    Usuario.updateUsuarioToTable(result.usuario, editUsuarioRow);
                }, function(errors) {
                    updateUsuarioForm.validate(errors);
                });
            } else {
                var data = createUsuarioForm.getValues();

                if (data.hasErrors) {
                    createUsuarioForm.validate(data.errors);
                    return;
                }

                var values = data.values;
                values.roles = Usuario.getRolesFromList();
                
                Model.createUsuario(values, function(result) {
                    $("#newUsuario").modal('hide');
                    Modal.success(result.message);
                    Usuario.addUsuarioToTable(result.usuario);
                }, function(errors) {
                    createUsuarioForm.validate(errors);
                });
            }
        },
        
        
        onRemoveUsuarioClick: function() {
            var tr = $(this).parent().parent();
            var id = $(tr).data('id');
            
            Modal.confirm(Lang.get('usuarios.remove_message'), function(result) {
                if (result == false) return;
                
                Model.removeUsuario(id, function(result) {
                    Modal.success(result.message);
                    $(tr).fadeOut(function() {
                        $(this).remove();
                    });
                }, function(r) {
                    Modal.error(r.errors.join('<br>'));
                });
            });
        },
        
        onCloseUsuarioModal: function(e) {
            createUsuarioForm.cleanValues();
            $("#newUsuarioTipo").val('');
            $("#tiposUsuario ul").html('');
        },
        
        onEditUsuarioClick: function() {
            editUsuarioRow = $($(this).parent().parent());
            editId = editUsuarioRow.data('id');
            isEdit = true;

            console.log("onEditUsuarioClick: " + editId);

            Model.getUsuario(editId, function(result) {
                Usuario.setFormEditTitle(result.nome);
                Usuario.addRolesToList(result.roles);
                updateUsuarioForm.setValues(result);
                $("#newUsuario").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        },

        onDetachRoleClick: function() {
            $(this).parent().remove();
        },

        roleExists: function(id) {
            var items = $("#tiposUsuario ul li");

            for (var i=0; i<items.length; i++) {
                var data = $(items[i]).data();
                if (data.id == id) return true;
            }

            return false;
        },

        getRolesFromList: function() {
            var items = $("#tiposUsuario ul li");
            var roles = [];

            for (var i=0; i<items.length; i++) {
                var data = $(items[i]).data();
                roles.push(data.id);
            }

            return roles;
        },

        onAddRoleClick: function() {
            var raw = $("#newUsuarioTipo").val();
            var data = raw.split('|');

            if (!Usuario.roleExists(data[0])) {
                Usuario.addRoleToList({id: data[0], name: data[1]});
            }
        }
    };    
    
})();

$(document).ready(function($) {
    Lang.register('usuarios.remove_message', "@lang('usuarios.remove_message')");
    Lang.register('general.edit', "@lang('general.edit')");
    Lang.register('usuarios.new', "@lang('usuarios.new')");

    Router.register('base', "{{ url('api/usuarios') }}");
    Usuario.init();

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
<div data-step="1" data-intro="@lang('help.painelUsuario')" class="col-xs-12">
	@include('utils.alerts')

    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@choice('usuarios.title', 2)</li>
    </ol>

    <div class="row">
        <div class="col-sm-2">
            <button data-step="6" data-intro="@lang('help.novoUsuario')" type="button" class="btn btn-primary pull-left" id="openNewUsuario">
                <i class="fa fa-plus"></i> @lang('usuarios.new')
            </button>
        </div>

        <div class="col-sm-10">
            <ul class="nav nav-pills pull-right">
                <li role="presentation" class="{{ (Request::is('usuarios*') && !Request::has('role')) ? 'active' : '' }}">
                    <a href="{{ url('/usuarios') }}">Todos</a>
                </li>

                @foreach ($roles as $role)
                <li role="presentation" class="{{ (Request::is('usuarios') && Request::input('role') == $role->name) ? 'active' : '' }}">
                    <a href="{{ url('/usuarios?role='.$role->name) }}">
                        {{ $role->display_name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    @include('usuario.criar_modal')
 
    <!-- Lista Usuarios -->
    <table class="table" id="usuarios">
        <thead>
            <tr>
                <th> @lang('usuarios.matricula')</th>
                <th> @lang('usuarios.nome')</th>
                <th class="text-center"> @lang('usuarios.roles')</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                @include('usuario.table-row', ['usuario' => $usuario])
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-container text-center">
        <?php echo $usuarios->render(); ?>
    </div>
</div>
@endsection
