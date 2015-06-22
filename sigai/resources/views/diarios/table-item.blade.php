<tr data-id="{{ isset($diario) ? $diario->id : '' }}" data-mes="{{ isset($diario) ? $diario->mes : '' }}">
    <td scope="row" class="text-center">{{ isset($diario) ? \Lang::get('months.'.$diario->mes) : '' }}</td>
    <td>{{ isset($diario) ? $diario->professor->usuario->nome : '' }}</td>
    <td>{{ isset($diario) ? $diario->created_at : '' }}</td>
    <td class="text-center">
        <a class="btn btn-danger btn-xs" target="diarioClasse"
           href="{{ url('/unidades_curriculares/'.(isset($uc) ? $uc->id : '').'/turmas/'.
                    (isset($turma) ? $turma->id : '').'/diarios/'.
                    (isset($diario) ? $diario->mes : '')) }}">
            <i class="fa fa-file-pdf-o"></i> @lang('diarios.print')
        </a>
    </td>
    <td class="text-center">
        <button class="btn btn-default btn-xs accordion-toggle"
                data-toggle="collapse" data-target="#diario-{{ isset($diario) ? $diario->id : '' }}">
            <i class="fa fa-history"></i> @lang('diarios.history')
        </button>

        <button class="btn btn-success btn-xs send">
            <i class="fa fa-arrow-circle-o-up"></i> @lang('diarios.send')
        </button>
    </td>
</tr>


<tr>
    <td colspan="5" class="hiddenRow">
        <div class="accordian-body collapse" id="diario-{{ isset($diario) ? $diario->id : '' }}">

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>@lang('diarios.send_date')</th>
                    <th>@lang('diarios.sent_by')</th>
                    <th>@lang('diarios.archive')</th>
                </tr>
                </thead>
                <tbody>
                @if (isset($diario))
                @foreach ($diario->envios as $envio)
                    <tr>
                        <td>{{ $envio->created_at }}</td>
                        <td>{{ $envio->professor->usuario->nome }}</td>
                        <td>

                            <a class="btn btn-danger btn-xs" target="diarioClasseArquivo"
                               href="">
                                <i class="fa fa-file-pdf-o"></i> @lang('diarios.print')
                            </a>

                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </td>
</tr>