@extends('app')

@section('js')
<script>
$(document).ready(function($) {
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
<div class="container-fluid">

    <button id="startHelp" class="help-button btn btn-large btn-success pull-right">
        <i class="fa fa-question-circle"></i> @lang('help.title')
    </button>
    
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		
		    <div class="text-center">
		        <img src="{{ asset('img/faculdade_senai.jpg') }}">
		    </div>
		
			<div data-step="1" data-intro="@lang('help.login')" class="panel panel-default">
				<div class="panel-heading">@lang('login.login')</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> @lang('login.error_msg').<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
			

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div data-step="2" data-intro="@lang('help.email')" class="form-group">
							<label class="col-md-4 control-label">@lang('login.email')</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div data-step="3" data-intro="@lang('help.senha')" class="form-group">
							<label class="col-md-4 control-label">@lang('login.password')</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> @lang('login.remember')
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button data-step="4" data-intro="@lang('help.entrar')" type="submit" class="btn btn-primary">
                                    @lang('login.login')
                                </button>

								<a data-step="5" data-intro="@lang('help.esquecerSenha')" class="btn btn-link" href="{{ url('/password/email') }}">
                                    @lang('login.forgot')
                                </a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
