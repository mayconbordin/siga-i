<div class="modal fade" id="newTurma" tabindex="-1" role="dialog"
     aria-labelledby="newTurmaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="newTurmaLabel">@lang('turmas.new')</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="newTurmaNome">@lang('turmas.nome')</label>
                        <input type="text" class="form-control" id="newTurmaNome" 
                               placeholder="@lang('turmas.nome')">
                        <label class="control-label hidden"></label>
                    </div>
                    
                    <div class="form-group">
                        <label for="newTurmaDataInicio">@lang('turmas.data_inicio')</label>
                        <input type="text" class="form-control date" id="newTurmaDataInicio"
                               data-provide="datepicker" data-date-format="dd/mm/yyyy"
                               placeholder="@lang('turmas.data_inicio')">
                        <label class="control-label hidden"></label>
                    </div>
                    
                    <div class="form-group">
                        <label for="newTurmaDataFim">@lang('turmas.data_fim')</label>
                        <input type="text" class="form-control date" id="newTurmaDataFim"
                               data-provide="datepicker" data-date-format="dd/mm/yyyy"
                               placeholder="@lang('turmas.data_fim')">
                        <label class="control-label hidden"></label>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 bootstrap-timepicker">
                            <label for="newTurmaHorarioInicio">@lang('turmas.horario') @lang('turmas.horario_inicio')</label>
                            <input type="text" class="form-control timepicker" id="newTurmaHorarioInicio"
                                   placeholder="@lang('turmas.horario_inicio')">
                            <label class="control-label hidden"></label>
                        </div>

                        <div class="form-group col-sm-6 bootstrap-timepicker">
                            <label for="newTurmaHorarioFim">@lang('turmas.horario') @lang('turmas.horario_fim')</label>
                            <input type="text" class="form-control timepicker" id="newTurmaHorarioFim"
                                   placeholder="@lang('turmas.horario_fim')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="newTurmaAmbiente">@lang('turmas.ambiente')</label>
                        <input type="text" class="form-control" id="newTurmaAmbiente"
                               placeholder="@lang('turmas.ambiente')">
                        <label class="control-label hidden"></label>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    @lang('general.cancel')
                </button>
                <button type="button" class="btn btn-primary save">
                    @lang('general.save')
                </button>
            </div>
        </div>
    </div>
</div>
