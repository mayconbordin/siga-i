<div role="tabpanel" class="tab-pane" id="turmas">
    <div class="tab-actions">
        <button id="criarTurmaBtn" class="btn btn-primary attach">
            <i class="fa fa-plus"></i> @lang('turmas.create')
        </button>
    </div>

    @include('turmas.criar_modal')

    <table class="table">
        <thead>
        <tr>
            <th>@lang('turmas.id')</th>
            <th>@lang('turmas.nome')</th>
            <th>@lang('turmas.data_inicio')</th>
            <th>@lang('turmas.data_fim')</th>
            <th class="text-center">@lang('general.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($uc->turmas as $t)
            @include('turmas.table-row', ['turma' => [
                'id'          => $t->id,
                'nome'        => $t->nome,
                'data_inicio' => $t->data_inicio->format('d/m/Y'),
                'data_fim'    => $t->data_fim->format('d/m/Y'),
                'url'         => url('/unidades_curriculares/'.$uc->id.'/turmas/'.$t->id)
            ], 'remove' => true])
        @endforeach
        </tbody>
    </table>
</div>