<div class="modal fade" id="statusDispositivo" tabindex="-1" role="dialog" aria-labelledby="statusDispositivoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="statusDispositivoLabel">@lang('dispositivos.status')</h4>
            </div>
            <div class="modal-body">

                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('heartbeats.data')</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.close')</button>
            </div>
        </div>
    </div>
</div>
