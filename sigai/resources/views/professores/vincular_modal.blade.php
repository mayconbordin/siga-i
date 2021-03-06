<div class="modal fade" id="vincularProfessor" tabindex="-1" role="dialog"
     aria-labelledby="vincularProfessorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="vincularProfessorLabel">@lang('professores.attach')</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="professorNomeOrMatricula" 
                               placeholder="@lang('professores.nome') @lang('general.or') @lang('professores.matricula')">
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
