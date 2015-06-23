<div role="tabpanel" class="tab-pane" id="alunos">
    @if (Auth::user()->can('edit-turma'))
        <div class="tab-actions">
            <a id="vincularAlunoBtn" class="btn btn-primary attach" href="#alunos">
                <i class="fa fa-chain"></i> @lang('alunos.attach')
            </a>
        </div>

        @include('alunos.vincular_modal')
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>@lang('alunos.matricula')</th>
            <th>@lang('alunos.nome')</th>
            <th>@lang('alunos.curso_origem')</th>
            <th class="text-center">@lang('alunos.status')</th>
            <th class="text-center">@lang('general.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($alunos as $aluno)
            @if (Auth::user()->can('edit-turma'))
                @include('alunos.turma-table-row', ['aluno' => $aluno, 'can_edit' => true])
            @else
                @include('alunos.turma-table-row', ['aluno' => $aluno])
            @endif
        @endforeach
        </tbody>
    </table>
</div>