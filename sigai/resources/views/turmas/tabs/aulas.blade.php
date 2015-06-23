<div role="tabpanel" class="tab-pane" id="aulas">
    <table class="table">
        <thead>
        <tr>
            <th>@lang('aulas.data')</th>
            <th class="text-center">@lang('aulas.status')</th>
            <th class="text-center">@lang('aulas.aula_a_distancia')</th>
            <th class="text-center">@lang('general.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($turma->aulas as $aula)
            <tr data-data="{{ $aula->data->format('Y-m-d') }}">
                <td scope="row">
                    <a href="{{ url('unidades_curriculares/' . $unidadeCurricular->id . '/turmas/' .
                                    $turma->id.'/aulas/' . $aula->data->format('Y-m-d')) }}">
                        {{ $aula->data->format('d/m/Y') }}
                    </a>
                </td>
                <td class="text-center">{{ $aula->status }}</td>
                <td class="text-center">
                    @if ($aula->aula_a_distancia)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-remove text-danger"></i>
                    @endif
                </td>
                <td class="text-center">
                    <button class="btn btn-default btn-xs remove">
                        <i class="fa fa-remove"></i> @lang('general.remove')
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>