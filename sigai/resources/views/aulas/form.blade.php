<form id="aulaForm" class="form-horizontal" method="post"
      @if (isset($aula))
      action="{{ url('unidades_curriculares/' . $aula->turma->unidadeCurricular->id .
                     '/turmas/' . $aula->turma->id . '/aulas/' . $aula->data->format('Y-m-d')) }}"
      @else
      action="{{ url('unidades_curriculares/'.$unidadeCurricular->id.'/turmas' .
                      $aula->turma->id . '/aulas') }}"
      @endif
>
    {{-- CSRF Token --}}
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    
    <fieldset {{ isset($aula) ? "disabled" : ""}}>
        {{-- Data --}}
        <div class="form-group {{{ $errors->has('data') ? 'has-error' : '' }}}">
            <label for="aulaData" class="col-sm-2 control-label">@lang('aulas.data')</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="aulaData" name="data"
                       placeholder="@lang('aulas.data')" data-date-format="dd/mm/yyyy" data-provide="datepicker"
                       value="{{{ Input::old('data', isset($aula) ? $aula->data->format('d/m/Y') : null) }}}">
                {!!$errors->first('data', '<label class="control-label">:message</label>')!!}
            </div>
        </div>

        {{-- Horário --}}
        <div class="form-group">
            <label class="col-sm-2 control-label">
                @lang('turmas.horario')
            </label>
            <div class="col-sm-5 row">
                {{-- Início --}}
                <div class="col-lg-5 {{{ $errors->has('horario_inicio') ? 'has-error' : '' }}}">
                    <div class="input-group bootstrap-timepicker">
                        <input id="turmaHorarioInicio" type="text" class="form-control timepicker"
                               name="horario_inicio" placeholder="@lang('turmas.horario_inicio')"
                               value="{{{ Input::old('horario_inicio', isset($aula) ? $aula->horario_inicio->format('H:i:s') : null) }}}">
                        <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                        </span>
                    </div>
                    {!!$errors->first('horario_inicio', '<label class="control-label">:message</label>')!!}
                </div>

                <label class="col-sm-1 control-label">
                    @lang('general.until')
                </label>

                {{-- Fim --}}
                <div class="col-lg-5 {{{ $errors->has('horario_fim') ? 'has-error' : '' }}}">
                    <div class="input-group bootstrap-timepicker">
                        <input id="turmaHorarioFim" type="text" class="form-control timepicker"
                               name="horario_fim" placeholder="@lang('turmas.horario_fim')"
                               value="{{{ Input::old('horario_fim', isset($aula) ? $aula->horario_fim->format('H:i:s') : null) }}}">
                        <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                        </span>
                    </div>
                    {!!$errors->first('horario_fim', '<label class="control-label">:message</label>')!!}
                </div>
            </div>
        </div>

        {{-- Ambiente --}}
        <div class="form-group {{{ $errors->has('ambiente_id') ? 'has-error' : '' }}}">
            <label for="turmaAmbiente" class="col-sm-2 control-label">
                @lang('turmas.ambiente')
            </label>
            <div class="col-sm-6">

                <div class="input-group bootstrap-timepicker">
                    <input id="turmaAmbiente" type="text" class="form-control"
                           value="{{ isset($aula) ? (isset($aula->ambiente) ? $aula->ambiente->nome : $aula->turma->ambienteDefault->nome) : null }}">
                    <input id="turmaAmbienteId" type="hidden" name="ambiente_id"
                           value="{{{ Input::old('ambiente_id', isset($aula) ? (isset($aula->ambiente) ? $aula->ambiente->id : null) : null) }}}">
                    <span class="input-group-addon">
                            <i class="fa fa-search"></i>
                    </span>
                </div>

                {!!$errors->first('ambiente_id', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        {{-- Conteúdo --}}
        <div class="form-group {{{ $errors->has('conteudo') ? 'has-error' : '' }}}">
            <label for="aulaConteudo" class="col-sm-2 control-label">
                @lang('aulas.conteudo')
            </label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" id="aulaConteudo" name="conteudo"
                          placeholder="@lang('aulas.conteudo')"
                >{{{ Input::old('conteudo', isset($aula) ? $aula->conteudo : null) }}}</textarea>
                {!!$errors->first('conteudo', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        {{-- Observações --}}
        <div class="form-group {{{ $errors->has('obs') ? 'has-error' : '' }}}">
            <label for="aulaObs" class="col-sm-2 control-label">
                @lang('aulas.obs')
            </label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" id="aulaObs" name="obs"
                          placeholder="@lang('aulas.obs')"
                >{{{ Input::old('obs', isset($aula) ? $aula->obs : null) }}}</textarea>
                {!!$errors->first('obs', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        {{-- Ensino a distância --}}
        <div class="form-group {{{ $errors->has('ensino_a_distancia') ? 'has-error' : '' }}}">
            <div class="col-sm-2"></div>
            <div class="col-sm-10 checkbox">
                <label>
                    <input type="checkbox" value="" id="aulaEnsinoDistancia" name="ensino_a_distancia"
                           {{{ Input::old('ensino_a_distancia', isset($aula) ? ($aula->ensino_a_distancia ? "checked" : "") : "") }}}>
                    @lang('aulas.aula_a_distancia')
                </label>
                {!!$errors->first('ensino_a_distancia', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">@lang('general.save')</button>
            </div>
        </div>
    </fieldset>
</form>
