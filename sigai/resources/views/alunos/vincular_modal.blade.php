<div class="modal fade" id="vincularAluno" tabindex="-1" role="dialog"
     aria-labelledby="vincularAlunoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="vincularAlunoLabel">@lang('alunos.attach')</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="alunoNomeOrMatricula">
                            @lang('alunos.nome') @lang('general.or') @lang('alunos.matricula')
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alunoNomeOrMatricula" 
                                   placeholder="@lang('alunos.nome') @lang('general.or') @lang('alunos.matricula')">
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="alunoStatus">@lang('alunos.status')</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="alunoStatus">
                                <option value="{{ App\Models\Aluno::STATUS_NORMAL }}">@lang('alunos.status_normal')</option>
                                <option value="{{ App\Models\Aluno::STATUS_CANCELADO }}">@lang('alunos.status_cancelado')</option>
                                <option value="{{ App\Models\Aluno::STATUS_TRANSFERIDO }}">@lang('alunos.status_transferido')</option>
                                <option value="{{ App\Models\Aluno::STATUS_DISPENSADO }}">@lang('alunos.status_dispensado')</option>
                                <option value="{{ App\Models\Aluno::STATUS_TRANCAMENTO_MATRICULA }}">@lang('alunos.status_trancamento')</option>
                                <option value="{{ App\Models\Aluno::STATUS_ENSINO_DISTANCIA }}">@lang('alunos.status_ead')</option>
                            </select>
                            <label class="control-label hidden"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="alunoCursoOrigem">@lang('alunos.curso_origem')</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="alunoCursoOrigem">
                                @if (isset($cursos))
                                @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">
                                    {{ $curso->nome }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                            <label class="control-label hidden"></label>
                        </div>
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
