<div class="modal fade" id="closeDiario" tabindex="-1" role="dialog"
     aria-labelledby="closeDiarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="closeDiarioLabel">@lang('diarios.close')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                <fieldset disabled>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="closeDiarioMes">@lang('diarios.month')</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="closeDiarioMes">
                                
                                @for ($i=1; $i<=12; $i++)
                                <option value="{{ $i }}" {{ (((int) Carbon\Carbon::now()->format('m')) == $i) ? 'selected' : '' }}>
                                    {{ \Lang::get('months.'.$i) }}
                                </option>
                                @endfor
                                
                            </select>
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                </fieldset>
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
