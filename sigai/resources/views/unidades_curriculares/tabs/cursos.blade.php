<div role="tabpanel" class="tab-pane" id="cursos">
    <div class="tab-actions">
        <button id="vincularCursoBtn" class="btn btn-primary attach">
            <i class="fa fa-chain"></i> @lang('cursos.attach')
        </button>
    </div>

    @include('cursos.vincular_modal')

    <table class="table">
        <thead>
        <tr>
            <th>@lang('cursos.id')</th>
            <th>@lang('cursos.nome')</th>
            <th>@lang('cursos.sigla')</th>
            <th class="text-center">@lang('general.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($uc->cursos as $c)
            @include('cursos.uc-table-row', ['curso' => $c, 'detach' => true])
        @endforeach
        </tbody>
    </table>
</div>