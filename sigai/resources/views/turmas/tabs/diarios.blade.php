<div role="tabpanel" class="tab-pane" id="diarios">

    <div class="tab-actions">
        <a id="closeDiarioBtn" class="btn btn-primary attach" href="#diarios">
            <i class="fa fa-file-text"></i> @lang('diarios.close')
        </a>

        <a class="btn btn-default attach pull-right" target="diarioClasseCompleto"
           href="{{ url('/unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id.'/diarios') }}">
            <i class="fa fa-file-text"></i> @lang('diarios.show_all')
        </a>
    </div>

    @include('diarios.fechar_modal', ['months' => $diariosToClose])

    <table id="diarios-table" class="table table-hover">
        <thead>
        <tr>
            <th class="text-center">@lang('diarios.month')</th>
            <th>@lang('diarios.closed_by')</th>
            <th>@lang('diarios.closed_at')</th>
            <th class="text-center">@lang('diarios.last_version')</th>
            <th class="text-center">@lang('diarios.send_list')</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($diarios as $d)
            @include('diarios.table-row', [
                'diario' => $d,
                'mes_nome' => \Lang::get('months.'.$d->mes),
                'print_url' => url('/unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id.'/diarios')
            ])
        @endforeach
        </tbody>
    </table>

</div>