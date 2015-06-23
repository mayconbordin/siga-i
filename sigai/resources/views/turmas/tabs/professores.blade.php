<div role="tabpanel" class="tab-pane" id="professores">
    @if (Auth::user()->can('edit-turma'))
        <div class="tab-actions">
            <a id="vincularProfessorBtn" class="btn btn-primary attach" href="#professores">
                <i class="fa fa-chain"></i> @lang('professores.attach')
            </a>
        </div>

        @include('professores.vincular_modal')
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>@lang('professores.matricula')</th>
            <th>@lang('professores.nome')</th>
            <th class="text-center">@lang('general.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($turma->professores as $p)
            @if (Auth::user()->can('edit-turma'))
                @include('professores.table-row', ['professor' => $p, 'can_edit' => true])
            @else
                @include('professores.table-row', ['professor' => $p])
            @endif
        @endforeach
        </tbody>
    </table>

</div>