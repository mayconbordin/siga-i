<div class="modal fade" id="formTipoUsuario" tabindex="-1" role="dialog" aria-labelledby="formTipoUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="formTipoUsuarioLabel">@lang('tipos_usuario.new')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="formTipoUsuarioName">@lang('tipos_usuario.name')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="formTipoUsuarioName"
                                   placeholder="@lang('tipos_usuario.name')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="formTipoUsuarioDisplayName">@lang('tipos_usuario.display_name')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="formTipoUsuarioDisplayName"
                                   placeholder="@lang('tipos_usuario.display_name')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="formTipoUsuarioDescription">@lang('tipos_usuario.description')</label>
                        <div class="col-sm-9">
                            <textarea  class="form-control" id="formTipoUsuarioDescription" rows="2"
                                   placeholder="@lang('tipos_usuario.description')"></textarea>
                            <label class="control-label hidden"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="formTipoUsuarioPermissao">@lang('tipos_usuario.permissions')</label>

                        <div class="col-sm-6">
                            <select class="form-control" id="formTipoUsuarioPermissao">
                                @if (isset($permissions))
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id . '|' . $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <button id="addPermissaoTipoUsuario" type="button" class="btn btn-success pull-right fixed-100-width"
                                    title="@lang('tipos_usuario.add_permission')">
                                <i class="fa fa-plus"></i> @lang('general.add')
                            </button>
                        </div>
                    </div>

                    <div id="permissoesTipoUsuario" class="col-sm-8 col-sm-offset-3">
                        <ul class="permissions-list list-unstyled row"></ul>
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
