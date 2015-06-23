<div role="tabpanel" class="tab-pane" id="controle-faltas">

    <table class="table table-hover">
        <thead>
        <tr>
            <th>@lang('alunos.matricula')</th>
            <th>@lang('alunos.nome')</th>
            <th class="text-center">@lang('alunos.status')</th>

            @foreach ($periods as $date)
                <th class="text-center">{{ $date['year']. '/' . $date['month'] }}</th>
            @endforeach

            <th class="text-center">Total</th>
            <th class="text-center">%</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($faltas as $f)
            <tr data-matricula="{{ $f->matricula }}">
                <td scope="row">{{ $f->matricula }}</td>
                <td>{{ $f->nome }}</td>

                <td class="text-center">
                    @if ($f->status == App\Models\Aluno::STATUS_NORMAL)
                        <span class="label label-default">{{ $f->status }}</span>
                    @elseif ($f->status == App\Models\Aluno::STATUS_CANCELADO)
                        <span class="label label-danger">{{ $f->status }}</span>
                    @else
                        <span class="label label-warning">{{ $f->status }}</span>
                    @endif
                </td>

                {{-- total de faltas por mês --}}
                @foreach ($periods as $date)
                    <td class="text-center">{{ $f->faltas[$date['key']]->total_faltas }}</td>
                @endforeach

                {{-- total de faltas na turma --}}
                <td class="text-center">{{ $f->total_faltas }}</td>

                {{-- porcentagem de faltas --}}
                @if ($f->pFaltas >= 25)
                    <td class="text-center chamada-failed">{{ number_format((float)$f->pFaltas, 1, '.', '') }}%</td>
                @elseif ($f->pFaltas < 25 && $f->pFaltas >= 20)
                    <td class="text-center chamada-warning">{{ number_format((float)$f->pFaltas, 1, '.', '') }}%</td>
                @else
                    <td class="text-center">{{ number_format((float)$f->pFaltas, 1, '.', '') }}%</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

</div>