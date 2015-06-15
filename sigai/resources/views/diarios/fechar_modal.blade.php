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
                <fieldset>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="closeDiarioMes">@lang('diarios.month')</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="closeDiarioMes">
                                
                                @foreach ($months as $month)
                                <option value="{{ $month }}" {{ (((int) Carbon\Carbon::now()->format('m')) == $month) ? 'selected' : '' }}>
                                    {{ \Lang::get('months.'.$month) }}
                                </option>
                                @endforeach
                                
                            </select>
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button id="closeDiarioPreview" type="button" class="btn btn-danger">
                    <i class="fa fa-file-pdf-o"></i> @lang('diarios.preview')
                </button>
            
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
