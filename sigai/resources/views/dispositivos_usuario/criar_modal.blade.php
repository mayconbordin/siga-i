<div class="modal fade" id="formDispositivo" tabindex="-1" role="dialog" aria-labelledby="formDispositivoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="formDispositivoLabel">@lang('dispositivos.new')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="formDispositivoCodigo">@lang('dispositivos_usuario.codigo')</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="formDispositivoCodigo" placeholder="@lang('dispositivos_usuario.codigo')">
                            <label class="control-label hidden"></label>
                            <p class="help-block">@lang('dispositivos_usuario.codigo_help')</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="formDispositivoUsuario">@choice('usuarios.title', 1)</label>
                        <div class="col-sm-6">
                            <input type="hidden" id="formDispositivoUsuarioId">
                            <input type="text" class="form-control" id="formDispositivoUsuario" placeholder="@choice('usuarios.title', 1)">
                            <label class="control-label hidden"></label>
                            <p class="help-block">@lang('dispositivos_usuario.usuario_help')</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="formDispositivoTipo">@choice('tipos_dispositivo.title', 1)</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="formDispositivoTipo">
                                @if (isset($tiposDispositivo))
                                    @foreach ($tiposDispositivo as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <label class="control-label hidden"></label>
                        </div>
                        <div class="col-sm-2">
                            <button id="openNewTipoDispositivo" type="button" class="btn btn-success pull-right"
                                    title="@lang('tipos_dispositivo.create')">
                                <i class="fa fa-plus"></i> @lang('general.create')
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.cancel')</button>
                <button type="button" class="btn btn-primary save">@lang('general.save')</button>
            </div>
        </div>
    </div>
</div>
