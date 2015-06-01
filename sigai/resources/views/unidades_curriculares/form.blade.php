<form id="ucForm" class="form-horizontal" method="post"
      @if (isset($uc))
      action="{{ url('unidades_curriculares', ['id' => $uc->id]) }}"
      @else
      action="{{ url('unidades_curriculares') }}"
      @endif>
      
    {{-- CSRF Token --}}
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      
    <fieldset {{ isset($uc) ? "disabled" : ""}}>
        {{-- Nome --}}
        <div class="form-group {{{ $errors->has('nome') ? 'has-error' : '' }}}">
            <label for="ucNome" class="col-sm-2 control-label">
                @lang('unidades_curriculares.nome')
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ucNome" name="nome"
                       placeholder="@lang('unidades_curriculares.nome')"
                       value="{{{ Input::old('nome', isset($uc) ? $uc->nome : null) }}}">
                {!!$errors->first('nome', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        {{-- Sigla --}}
        <div class="form-group {{{ $errors->has('sigla') ? 'has-error' : '' }}}">
            <label for="ucSigla" class="col-sm-2 control-label">
                @lang('unidades_curriculares.sigla')
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ucSigla" name="sigla"
                       placeholder="@lang('unidades_curriculares.sigla')"
                       value="{{{ Input::old('sigla', isset($uc) ? $uc->sigla : null) }}}">
                {!!$errors->first('sigla', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        {{-- Carga Horaria --}}
        <div class="form-group {{{ $errors->has('carga_horaria') ? 'has-error' : '' }}}">
            <label for="ucCargaHoraria" class="col-sm-2 control-label">
                @lang('unidades_curriculares.carga_horaria')
            </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ucCargaHoraria" name="carga_horaria"
                       placeholder="@lang('unidades_curriculares.carga_horaria')"
                       value="{{{ Input::old('carga_horaria', isset($uc) ? $uc->carga_horaria : null) }}}">
                {!!$errors->first('carga_horaria', '<label class="control-label">:message</label>')!!}
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">@lang('general.save')</button>
            </div>
        </div>
    </fieldset>
</form>
