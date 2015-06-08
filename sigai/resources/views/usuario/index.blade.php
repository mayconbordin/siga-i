@extends('app')
 
@section('title')
@lang('usuarios.me_title') ::
@parent
@stop

@section('js')
<script src="{{ asset('/js/pwstrength-bootstrap-1.2.7.min.js') }}"></script>
<script>
$(document).ready(function($) {
    var options = {};
    options.ui = {
        container: "#passwordFormGroup",
        showVerdictsInsideProgressBar: true,
        viewports: {
            progress: ".pwstrength_viewport_progress"
        },
        verdicts: [
            "@lang('login.password_strength.weak')",
            "@lang('login.password_strength.normal')",
            "@lang('login.password_strength.medium')",
            "@lang('login.password_strength.strong')",
            "@lang('login.password_strength.very_strong')"]
    };
    $('#usuarioPassword').pwstrength(options);
});
</script>
@endsection

@section('content')
<div class="col-xs-12">
	@include('utils.alerts')
	
	<div class="panel panel-default">
		<div class="panel-heading">@lang('usuarios.me_title')</div>

		<div class="panel-body">
			<form class="form-horizontal" method="post" action="{{ url('conta') }}">
			
			    {{-- CSRF Token --}}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                
                {{-- Nome --}}
                <div class="form-group {{{ $errors->has('nome') ? 'has-error' : '' }}}">
                    <label for="usuarioNome" class="col-sm-2 control-label">
                        @lang('usuarios.nome')
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="usuarioNome" name="nome"
                               placeholder="@lang('usuarios.nome')"
                               value="{{{ Input::old('nome', isset($usuario) ? $usuario->nome : null) }}}">
                        {!!$errors->first('nome', '<label class="control-label">:message</label>')!!}
                    </div>
                </div>
                
                {{-- Email --}}
                <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
                    <label for="usuarioEmail" class="col-sm-2 control-label">
                        @lang('usuarios.email')
                    </label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="usuarioEmail" name="email"
                               placeholder="@lang('usuarios.email')"
                               value="{{{ Input::old('email', isset($usuario) ? $usuario->email : null) }}}">
                        {!!$errors->first('email', '<label class="control-label">:message</label>')!!}
                    </div>
                </div>
                
                {{-- Senha --}}
                <div id="passwordFormGroup" class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
                    <label for="usuarioPassword" class="col-sm-2 control-label">
                        @lang('login.password')
                    </label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="usuarioPassword" name="password"
                               placeholder="@lang('login.password')"
                               value="{{{ Input::old('password', null) }}}">
                        {!!$errors->first('password', '<label class="control-label">:message</label>')!!}
                    </div>
                    <div class="col-sm-4" style="padding-top: 5px;">
                        <div class="pwstrength_viewport_progress"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">@lang('general.save')</button>
                    </div>
                </div>
            </form> 
		</div>
	</div>
	
</div>
@endsection
