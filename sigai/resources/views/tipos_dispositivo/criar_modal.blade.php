<div class="modal fade" id="formTipoDispositivo" tabindex="-1" role="dialog" aria-labelledby="formTipoDispositivoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="formTipoDispositivoLabel">@lang('tipos_dispositivo.new')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="formTipoDispositivoNome">@lang('tipos_dispositivo.nome')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="formTipoDispositivoNome" 
                                   placeholder="@lang('dispositivos.nome')">
                            <label class="control-label hidden"></label>
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
