<div class="modal fade" id="formAmbiente" tabindex="-1" role="dialog" aria-labelledby="formAmbienteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="formAmbienteLabel">@lang('ambientes.new')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="formAmbienteNome">@lang('ambientes.nome')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="formAmbienteNome" 
                                   placeholder="@lang('ambientes.nome')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="formAmbienteTipo">@choice('tipos_ambiente.title', 1)</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="formAmbienteTipo">
                                @if (isset($tiposAmbiente))
                                    @foreach ($tiposAmbiente as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <label class="control-label hidden"></label>
                        </div>
                        <div class="col-sm-1">
                            <button id="openNewTipoAmbiente" type="button" class="btn btn-success pull-right"
                                    title="@lang('tipos_ambiente.create')">
                                <i class="fa fa-plus"></i>
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
