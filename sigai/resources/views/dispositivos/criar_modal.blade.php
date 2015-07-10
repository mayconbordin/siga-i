<div class="modal fade" id="formDispositivo" tabindex="-1" role="dialog" aria-labelledby="formDispositivoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                        <label class="col-sm-4 control-label" for="formDispositivoId">@lang('dispositivos.id')</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="formDispositivoId"
                                   placeholder="@lang('dispositivos.id')">
                            <label class="control-label hidden"></label>
                            <p class="help-block">@lang('dispositivos.id_help')</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="formDispositivoName">@lang('dispositivos.nome')</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="formDispositivoName"
                                   placeholder="@lang('dispositivos.nome')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="formDispositivoSecret">@lang('dispositivos.secret')</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="formDispositivoSecret"
                                   placeholder="@lang('dispositivos.secret')">
                            <label class="control-label hidden"></label>
                            <p class="help-block">@lang('dispositivos.secret_help')</p>
                        </div>
                        <div class="col-sm-2">
                            <button id="generateDispositivoSecret" type="button" class="btn btn-primary pull-right fixed-100-width"
                                    title="@lang('dispositivos.generate_secret')">
                                <i class="fa fa-refresh"></i> @lang('general.generate')
                            </button>
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
                            <button id="openNewTipoDispositivo" type="button" class="btn btn-success pull-right fixed-100-width"
                                    title="@lang('tipos_dispositivo.create')">
                                <i class="fa fa-plus"></i> @lang('general.create')
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="formDispositivoAmbiente">@lang('dispositivos.ambiente')</label>
                        <div class="col-sm-6">
                            <input type="hidden" id="formDispositivoAmbienteId">
                            <input type="text" class="form-control" id="formDispositivoAmbiente"
                                   placeholder="@lang('dispositivos.ambiente')">
                            <label class="control-label hidden"></label>
                            <p class="help-block">@lang('dispositivos.ambiente_help')</p>
                        </div>
                        <div class="col-sm-2">
                            <button id="removeDispositivoAmbiente" type="button" class="btn btn-danger pull-right fixed-100-width">
                                <i class="fa fa-remove"></i> @lang('general.remove')
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
