<!-- Novo Aluno -->
<div class="modal fade" id="newAluno" tabindex="-1" role="dialog" aria-labelledby="newAlunoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="newAlunoabel">@lang('alunos.new_aluno')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newAlunoMatricula">@lang('alunos.matricula')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newAlunoMatricula" 
                                   placeholder="@lang('alunos.matricula')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newAlunoNome">@lang('alunos.nome')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newAlunoNome" 
                                   placeholder="@lang('alunos.nome')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newAlunoEmail">@lang('alunos.email')</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="newAlunoEmail" 
                                   placeholder="@lang('alunos.email')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newAlunoPassword">@lang('login.password')</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="newAlunoPassword" 
                                   placeholder="@lang('login.password')">
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
