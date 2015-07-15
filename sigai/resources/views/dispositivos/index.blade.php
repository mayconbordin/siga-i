@extends('app')
 
@section('title')
@choice('dispositivos.title', 2) ::
@parent
@stop

@section('js')
<script id="dispositivo-table-row" type="text/x-handlebars-template">
    @include('dispositivos.table-row', ['raw' => true])
</script>
<script id="scope-item" type="text/x-handlebars-template">
    @include('dispositivos.scope-item', ['raw' => true])
</script>

<script>

var Dispositivo = (function() {
    var dispositivoForm = new Form({
        id                  : {el: "#formDispositivoId"    , required: true},
        secret              : {el: "#formDispositivoSecret", required: true},
        name                : {el: "#formDispositivoName"  , required: true},
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
        var scopeItem = $("#scope-item").html();

        return {
            dispositivoTableRow: Handlebars.compile(dispositivoTableRow),
            scopeItem: Handlebars.compile(scopeItem)
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

        getHeartbeats: function(id, success, error) {
            $.ajax({
                url: Router.get('base') + "/" + id + "/heartbeats",
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
        },

        changeDispositivoAmbiente: function(id, success, error) {
            $.ajax({
                url: Router.get('base') + '/' + id + '/ambiente',
                method: 'PUT'
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

            $("#generateDispositivoSecret").click(this.onGenerateDispositivoSecret);

            // eventos para criar novo tipo de dispositivo
            $("#openNewTipoDispositivo").click(this.onOpenNewTipoDispositivoModal)
            $("#formTipoDispositivo .save").click(this.onSaveTipoDispositivoClick);

            $("#removeDispositivoAmbiente").click(this.onRemoveDispositivoAmbienteClick);

            $("#formDispositivoAmbiente").typeahead({
                onSelect: function(item) {
                    $("#formDispositivoAmbienteId").val(item.value);
                },
                ajax: {
                    url: Router.get('ambientes'),
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

            $("#addPermissaoDispositivo").click(this.onAddPermissaoDispositivoClick);
            $("#permissoesDispositivo button.detach").click(this.onDetachPermissaoClick);
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

        addScopeDispositivoToList: function(scope) {
            var html = $(Template.scopeItem({
                scope: scope
            }));

            html.find('.detach').click(this.onDetachPermissaoClick);
            $("#permissoesDispositivo ul").append(html);
        },

        addScopesDispositivoToList: function(scopes) {
            for(var i=0; i<scopes.length; i++) {
                Dispositivo.addScopeDispositivoToList(scopes[i]);
            }
        },

        addHeartbeatsToTable: function(heartbeats) {
            var html = '';

            for (var i=0; i<heartbeats.length; i++) {
                html += '<tr><th scope="row">'+heartbeats[i].id+'</th><td>'+heartbeats[i].created_at+'</td></tr>';
            }

            $("#statusDispositivo table>tbody").html(html);
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
            values.scopes = Dispositivo.getScopesDispositivosFromList();

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
            $("#formDispositivoAmbiente").val('');
            $("#permissoesDispositivo ul").html('');
        },
        
        onEditDispositivoClick: function() {
            editDispositivoRow = $($(this).parent().parent());
            editDispositivoId = editDispositivoRow.data('id');
            isEdit = true;

            Model.getDispositivo(editDispositivoId, function(result) {
                dispositivoForm.setValues(result);

                if (result.ambientes.length > 0) {
                    var ambiente = result.ambientes[0];
                    $("#formDispositivoAmbienteId").val(ambiente.id);
                    $("#formDispositivoAmbiente").val(ambiente.nome);
                }

                Dispositivo.addScopesDispositivoToList(result.scopes);
                Dispositivo.setFormEditTitle(result.name);
                $("#formDispositivo").modal('show');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        },

        onGenerateDispositivoSecret: function() {
            var seed = 'ts=' + (new Date()).toISOString() + '; userAgent=' + navigator.userAgent + '; random=' + Math.random();

            var shaObj = new jsSHA("SHA-1", "TEXT");
            shaObj.update(seed);

            $("#formDispositivoSecret").val(shaObj.getHash("HEX"));
        },

        onRemoveDispositivoAmbienteClick: function() {
            Model.changeDispositivoAmbiente(editDispositivoId, function(result) {
                $("#formDispositivoAmbienteId").val('');
                $("#formDispositivoAmbiente").val('');
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
            });
        },

        onStatusDispositivoClick: function() {
            var row = $($(this).parent().parent());
            var id = row.data('id');

            Model.getHeartbeats(id, function(result) {
                Dispositivo.addHeartbeatsToTable(result);
                $('#statusDispositivo').modal('show');
            }, function(json) {
                Modal.error(json.errors.join('<br>'));
            });
        },

        onDetachPermissaoClick: function() {
            $(this).parent().remove();
        },

        scopeExists: function(id) {
            var items = $("#permissoesDispositivo ul li");

            for (var i=0; i<items.length; i++) {
                var data = $(items[i]).data();
                if (data.id == id) return true;
            }

            return false;
        },

        getScopesDispositivosFromList: function() {
            var items = $("#permissoesDispositivo ul li");
            var scopes = [];

            for (var i=0; i<items.length; i++) {
                var data = $(items[i]).data();
                scopes.push(data.id);
            }

            return scopes;
        },

        onAddPermissaoDispositivoClick: function() {
            var scopeId = $("#formDispositivoPermissao").val();

            if (!Dispositivo.scopeExists(scopeId)) {
                Dispositivo.addScopeDispositivoToList({id: scopeId});
            }
        }
    };    

    
    
})();

$(document).ready(function($) {
    Router.register('base', "{{ url('api/dispositivos') }}");
    Router.register('tipos_dispositivo', "{{ url('api/tipos_dispositivo') }}");
    Router.register('ambientes', "{{ url('api/ambientes') }}");

    Lang.register('dispositivos.remove_message', "@lang('dispositivos.remove_message')");
    Lang.register('dispositivos.new', "@lang('dispositivos.new')");
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
        <li class="active">@choice('dispositivos.title', 2)</li>
    </ol>
    
    <button type="button" class="btn btn-primary" id="openNewDispositivo">
        <i class="fa fa-plus"></i> @lang('dispositivos.new')
    </button>
    
    @include('dispositivos.criar_modal')
    @include('tipos_dispositivo.criar_modal')
    @include('dispositivos.status_modal')

    <!-- Lista Dispositivos -->
    <table class="table" id="dispositivos">
        <thead>
            <tr>
                <th>@lang('dispositivos.id')</th>
                <th>@lang('dispositivos.nome')</th>
                <th>@lang('dispositivos.secret')</th>
                <th class="text-center">@choice('tipos_dispositivo.title', 1)</th>
                <th class="text-center">@choice('ambientes.title', 1)</th>
                <th class="text-center">@lang('dispositivos.status')</th>
                <th class="text-center">@lang('dispositivos.info')</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dispositivos as $dispositivo)
                @include('dispositivos.table-row', ['dispositivo' => $dispositivo])
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-container text-center">
        <?php echo $dispositivos->render(); ?>
    </div>
</div>
@endsection
