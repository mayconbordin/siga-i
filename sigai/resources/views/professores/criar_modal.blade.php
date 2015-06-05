<div class="modal fade" id="newProfessor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="newProfessorLabel">@lang('professores.new')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newProfessorMatricula">@lang('professores.matricula')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newProfessorMatricula" 
                                   placeholder="@lang('professores.matricula')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newProfessorNome">@lang('professores.nome')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newProfessorNome" 
                                   placeholder="@lang('professores.nome')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newProfessorCursoOrigem">@lang('professores.curso_origem')</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="newProfessorCursoOrigem">
                                @if (isset($cursos))
                                @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                @endforeach
                                @endif
                            </select>
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newProfessorEmail">@lang('professores.email')</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="newProfessorEmail" 
                                   placeholder="@lang('professores.email')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newProfessorPassword">@lang('login.password')</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="newProfessorPassword" 
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
