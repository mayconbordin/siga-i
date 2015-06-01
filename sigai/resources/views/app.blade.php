<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="<?= csrf_token() ?>">
        
        <link rel="icon" href="{{ asset('/favicon.ico') }}">

        <title>
            @section('title')
            @lang('general.site_name')
            @show
        </title>
        <meta name="description" content="@lang('general.site_description')">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        
        <!-- Plug-ins CSS -->
        <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
        
        @yield('css')

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <!-- Only small screen -->
                    <button type="button" class="navbar-toggle collapsed"
                            data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand" href="#">SIGA-i</a>
                </div>
                
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>

                    </ul>
                    
                    
                    <ul class="nav navbar-nav navbar-nav-right">
                        @if (Auth::guest())
					    <li><a href="{{ url('/auth/login') }}">@lang('login.login')</a></li>
					    <li><a href="{{ url('/auth/register') }}">@lang('login.register')</a></li>
					    @else
					    <li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						        <i class="fa fa-user"></i> <span class="caret"></span>
					        </a>
						    <ul class="dropdown-menu" role="menu">
							    <li><a href="{{ url('/auth/logout') }}">@lang('login.logout')</a></li>
						    </ul>
					    </li>
					    @endif
                    </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->


        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                
                @yield('content')
            
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                        <a href="{{ url('/alunos') }}" class="list-group-item {{ (Request::is('alunos*')) ? 'active' : '' }}">
                            @choice('alunos.title', 2)
                        </a>
                        
                        <a href="{{ url('/professores') }}" class="list-group-item {{ (Request::is('professores*')) ? 'active' : '' }}">
                            @choice('professores.title', 2)
                        </a>
                        
                        <a href="{{ url('/unidades_curriculares') }}" class="list-group-item {{ (Request::is('unidades_curriculares*')) ? 'active' : '' }}">
                            @lang('unidades_curriculares.title')
                        </a>
                        
                        <a href="{{ url('/cursos') }}" class="list-group-item {{ (Request::is('cursos*')) ? 'active' : '' }}">
                            @lang('cursos.title')
                        </a>

                    </div>
                </div><!--/.sidebar-offcanvas-->
            </div><!--/row-->
        </div><!--/container-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        -->
        <script>window.jQuery || document.write('<script src="{{ asset("/js/jquery-1.11.2.min.js") }}"><\/script>')</script>
        
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap-typeahead.min.js') }}"></script>
        <script src="{{ asset('/js/bootbox.min.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
        
        @yield('js')

    </body>
</html>

