<form id="turmaForm" class="form-horizontal" method="post"
      @if (isset($turma))
      action="{{ url('unidades_curriculares/'.$unidadeCurricular->id.'/turmas/'.$turma->id) }}"
      @else
      action="{{ url('unidades_curriculares/'.$unidadeCurricular->id.'/turmas') }}"
      @endif
>
    {{-- CSRF Token --}}
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    
    <fieldset  {{ isset($turma) ? "disabled" : ""}}>
        {{-- Nome --}}
        <div class="form-group {{{ $errors->has('nome') ? 'has-error' : '' }}}">
            <label for="turmaNome" class="col-sm-2 control-label">@lang('turmas.nome')</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="turmaNome" name="nome"
                       placeholder="@lang('turmas.nome')"
                       value="{{{ Input::old('nome', isset($turma) ?
                                  $turma->nome : null) }}}">
                {!!$errors->first('nome', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        {{-- Data de Início --}}
        <div class="form-group {{{ $errors->has('data_inicio') ? 'has-error' : '' }}}">
            <label for="turmaDataInicio" class="col-sm-2 control-label">
                @lang('turmas.data_inicio')
            </label>
            <div class="col-sm-10">
                <input class="form-control date" id="turmaDataInicio" name="data_inicio"
                       data-date-format="dd/mm/yyyy" data-provide="datepicker"
                       type="text" placeholder="@lang('turmas.data_inicio')"
                       value="{{{ Input::old('data_inicio', isset($turma) ? 
                                  $turma->data_inicio->format('d/m/Y') : null) }}}">
                {!!$errors->first('data_inicio', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        {{-- Data de Fim --}}
        <div class="form-group {{{ $errors->has('data_fim') ? 'has-error' : '' }}}">
            <label for="turmaDataFim" class="col-sm-2 control-label">
                @lang('turmas.data_fim')
            </label>
            <div class="col-sm-10">
                <input class="form-control date" id="turmaDataFim" name="data_fim"
                       data-date-format="dd/mm/yyyy" data-provide="datepicker"
                       type="text" placeholder="@lang('turmas.data_fim')"
                       value="{{{ Input::old('data_fim', isset($turma) ? 
                                  $turma->data_fim->format('d/m/Y') : null) }}}">
                {!!$errors->first('data_fim', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        {{-- Unidade Curricular --}}
        <div class="form-group {{{ $errors->has('unidade_curricular_id') ? 'has-error' : '' }}}">
            <label for="turmaCargaHoraria" class="col-sm-2 control-label">
                @lang('unidades_curriculares.single_title')
            </label>
            <div class="col-sm-10">
                <select class="form-control" id="turmaUnidadeCurricular" name="unidade_curricular_id">
                    @foreach ($unidadesCurriculares as $uc)
                    <option value="{{ $uc->id }}"
                    {{ (Input::old('unidade_curricular_id', $unidadeCurricular->id) == $uc->id) ? 'selected="selected"' : '' }}
                    >
                        {{ $uc->nome }}
                    </option>
                    @endforeach
                </select>
                {!!$errors->first('unidade_curricular_id', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">@lang('general.save')</button>
            </div>
        </div>
    </fieldset>
</form>
