@extends('app')
 
@section('title')
@lang('usuarios.me_title') ::
@parent
@stop

@section('js')
<script>
$(document).ready(function($) {
    var options = {};
    options.ui = {
        container: "#newPasswordFormGroup",
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
    $('#usuarioNewPassword').pwstrength(options);

    var intro = introJs();
    intro.setOptions({
        skipLabel: '@lang("help.skipLabel")',
        nextLabel: '@lang("help.nextLabel")',
        prevLabel: '@lang("help.prevLabel")',
        doneLabel: '@lang("help.doneLabel")',
        
        showProgress: true
    });
   
    $("#startHelp").click(function() {
        intro.start();
    });
});
</script>
@endsection

@section('content')
<div data-step="1" data-intro="@lang('help.contaUsuario')"  class="col-xs-12">
	@include('utils.alerts')

    <div class="row">
        <div class="col-lg-12">
            <button id="startHelp" class="help-button btn btn-large btn-success pull-right">
                <i class="fa fa-question-circle"></i> @lang('help.title')
            </button>
        </div>
    </div>
	
	<div data-step="2" data-intro="@lang('help.editarConta')" class="panel panel-default">
		<div class="panel-heading">@lang('usuarios.me_title')</div>

		<div data-step="3" data-intro="@lang('help.editarCampos')" class="panel-body">
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
                        @lang('usuarios.current_password')
                    </label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="usuarioPassword" name="password"
                               placeholder="@lang('usuarios.current_password')"
                               value="{{{ Input::old('password', null) }}}">
                        {!!$errors->first('password', '<label class="control-label">:message</label>')!!}
                    </div>
                    <div class="col-sm-4" style="padding-top: 5px;">
                        <div class="pwstrength_viewport_progress"></div>
                    </div>
                </div>
                
                {{-- Senha Nova --}}
                <div data-step="4" data-intro="@lang('help.senha')" id="newPasswordFormGroup"
                     class="form-group {{{ $errors->has('new_password') ? 'has-error' : '' }}}">
                    <label for="usuarioNewPassword" class="col-sm-2 control-label">
                        @lang('usuarios.new_password')
                    </label>
                    
                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="usuarioNewPassword" name="new_password"
                               placeholder="@lang('usuarios.new_password')"
                               value="{{{ Input::old('new_password', null) }}}">
                        {!!$errors->first('new_password', '<label class="control-label">:message</label>')!!}
                    </div>
                    
                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="usuarioNewPasswordRepeat" name="new_password_confirmation"
                               placeholder="@lang('usuarios.new_password_repeat')"
                               value="{{{ Input::old('new_password_repeat', null) }}}">
                        {!!$errors->first('new_password_repeat', '<label class="control-label">:message</label>')!!}
                    </div>
                    
                    <div class="col-sm-4" style="padding-top: 5px;">
                        <div class="pwstrength_viewport_progress"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button data-step="4" data-intro="@lang('help.salvarUsuario')" type="submit" class="btn btn-success">
                            @lang('general.save')
                        </button>
                    </div>
                </div>
            </form> 
		</div>
	</div>
	
</div>
@endsection
