<div class="modal fade" id="newUsuario" tabindex="-1" role="dialog" aria-labelledby="newUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="newUsuarioLabel">@lang('alunos.new_aluno')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newUsuarioMatricula">@lang('alunos.matricula')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newUsuarioMatricula" 
                                   placeholder="@lang('alunos.matricula')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newUsuarioNome">@lang('alunos.nome')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newUsuarioNome" 
                                   placeholder="@lang('alunos.nome')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newUsuarioEmail">@lang('alunos.email')</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="newUsuarioEmail" 
                                   placeholder="@lang('alunos.email')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newUsuarioPassword">@lang('login.password')</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="newUsuarioPassword" 
                                   placeholder="@lang('login.password')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="newUsuarioTipo">@lang('usuarios.roles')</label>

                        <div class="col-sm-6">
                            <select class="form-control" id="newUsuarioTipo">
                                @if (isset($roles))
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id . '|' . $role->name }}">{{ strlen($role->display_name) > 0 ? $role->display_name : $role->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <button id="addTipoUsuario" type="button" class="btn btn-success pull-right fixed-100-width"
                                    title="@lang('usuarios.add_role')">
                                <i class="fa fa-plus"></i> @lang('general.add')
                            </button>
                        </div>
                    </div>

                    <div id="tiposUsuario" class="col-sm-6 col-sm-offset-3">
                        <ul class="list-group"></ul>
                    </div>

                    <div class="clearfix"></div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.cancel')</button>
                <button type="button" class="btn btn-primary save">@lang('general.save')</button>
            </div>
        </div>
    </div>
</div>
