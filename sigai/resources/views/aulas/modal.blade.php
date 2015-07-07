<div class="modal fade" id="newAula" tabindex="-1" role="dialog"
     aria-labelledby="newAulaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="newAulaLabel">@lang('turmas.single_title')</h4>
            </div>
            <div class="modal-body">
                <form>
                    
                    <input type="hidden" id="newAulaId" name="_id" value="" />
                
                    <div class="form-group">
                        <label for="newAulaData">@lang('aulas.data')</label>
                        <input type="text" class="form-control date" id="newAulaData"
                               data-provide="datepicker" data-date-format="dd/mm/yyyy"
                               placeholder="@lang('aulas.data')">
                        <label class="control-label hidden"></label>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6 bootstrap-timepicker">
                            <label for="newAulaHorarioInicio">@lang('aulas.horario') @lang('aulas.horario_inicio')</label>
                            <input type="text" class="form-control timepicker" id="newAulaHorarioInicio"
                                   placeholder="@lang('turmas.horario_inicio')">
                            <label class="control-label hidden"></label>
                        </div>

                        <div class="form-group col-sm-6 bootstrap-timepicker">
                            <label for="newAulaHorarioFim">@lang('aulas.horario') @lang('aulas.horario_fim')</label>
                            <input type="text" class="form-control timepicker" id="newAulaHorarioFim"
                                   placeholder="@lang('aulas.horario_fim')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="newAulaAmbiente">@lang('aulas.ambiente')</label>
                        <input type="hidden" id="newAulaAmbienteId">
                        <input type="text" class="form-control" id="newAulaAmbiente"
                               placeholder="@lang('aulas.ambiente')">
                        <label class="control-label hidden"></label>
                    </div>
                    
                    <div class="form-group">
                        <label for="newAulaDataFim">@lang('aulas.conteudo')</label>
                        <textarea class="form-control" rows="3" id="newAulaConteudo"
                                  placeholder="@lang('aulas.conteudo')">
                        </textarea>
                        <label class="control-label hidden"></label>
                    </div>
                    
                    <div class="form-group">
                        <label for="newAulaObs">@lang('aulas.obs')</label>
                        <textarea class="form-control" rows="3" id="newAulaObs"
                                  placeholder="@lang('aulas.obs')">
                        </textarea>
                        <label class="control-label hidden"></label>
                    </div>
                    
                    <div class="form-group checkbox">
                        <label>
                            <input type="checkbox" value="" id="newAulaEnsinoDistancia">
                            @lang('aulas.aula_a_distancia')
                        </label>
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
