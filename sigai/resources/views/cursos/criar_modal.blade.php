<!-- Novo Aluno -->
<div class="modal fade" id="newCurso" tabindex="-1" role="dialog" aria-labelledby="newCursoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="newCursoabel">@lang('cursos.new')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newCursoNome">@lang('cursos.nome')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newCursoNome" 
                                   placeholder="@lang('cursos.nome')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newCursoSigla">@lang('cursos.sigla')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newCursoSigla" 
                                   placeholder="@lang('cursos.sigla')">
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
