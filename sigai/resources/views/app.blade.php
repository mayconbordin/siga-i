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
        
        <!-- Stylesheets -->
        <link href="{{ asset('/css/app.min.css') }}" rel="stylesheet">
        
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
                    
                    <span class="navbar-brand">SIGA-i</span>
                </div>
                
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{ (Request::is('/')) ? 'active' : '' }}"><a href="{{ url('/') }}">@lang('general.home')</a></li>

                        @if (Auth::guest())

                        @endif

                        @if (Auth::check() && (Auth::user()->hasRole('coordenador') || Auth::user()->hasRole('admin')))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-table"></i> @lang('general.records') <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="{{ (Request::is('unidades_curriculares*')) ? 'active' : '' }}">
                                    <a href="{{ url('/unidades_curriculares') }}">@lang('unidades_curriculares.title')</a>
                                </li>

                                <li class="{{ (Request::is('cursos*')) ? 'active' : '' }}">
                                    <a href="{{ url('/cursos') }}">@lang('cursos.title')</a>
                                </li>

                                <li class="{{ (Request::is('turmas*')) ? 'active' : '' }}">
                                    <a href="{{ url('/turmas') }}">@lang('turmas.title')</a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-users"></i> @choice('usuarios.title', 2) <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="{{ (Request::is('alunos*')) ? 'active' : '' }}">
                                    <a href="{{ url('/alunos') }}">@choice('alunos.title', 2)</a>
                                </li>

                                <li class="{{ (Request::is('professores*')) ? 'active' : '' }}">
                                    <a href="{{ url('/professores') }}">@choice('professores.title', 2)</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if (Auth::check() && (Auth::user()->hasRole('professor') || Auth::user()->hasRole('admin')))
                        
                        @endif

                        @if (Auth::check() && Auth::user()->hasRole('admin'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-cogs"></i> @lang('general.admin') <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="{{ (Request::is('ambientes*')) ? 'active' : '' }}">
                                    <a href="{{ url('/ambientes') }}">@choice('ambientes.title', 2)</a>
                                </li>
                                <li class="{{ (Request::is('dispositivos')) ? 'active' : '' }}">
                                    <a href="{{ url('/dispositivos') }}">@choice('dispositivos.title', 2)</a>
                                </li>
                                <li class="{{ (Request::is('usuarios*')) ? 'active' : '' }}">
                                    <a href="{{ url('/usuarios') }}">@choice('usuarios.title', 2)</a>
                                </li>
                                <li class="{{ (Request::is('tipos_usuario*')) ? 'active' : '' }}">
                                    <a href="{{ url('/tipos_usuario') }}">@choice('tipos_usuario.title', 2)</a>
                                </li>
                                <li class="{{ (Request::is('dispositivos_usuario*')) ? 'active' : '' }}">
                                    <a href="{{ url('/dispositivos_usuario') }}">@choice('dispositivos_usuario.title', 2)</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        
                        @if (Auth::check())
                        <li class="navbar-green {{ (Request::is('importar*')) ? 'active' : '' }}">
                            <a href="{{ url('/importar') }}"><i class="fa fa-arrow-up"></i> @lang('importar.menu_title')</a>
                        </li>
                        @endif

                        <li class="visible-xs-block">
                            <a href="{{ url('/conta') }}">
                                <i class="fa fa-gear"></i> @lang('usuarios.me_title')
                            </a>
                        </li>

                        <li class="visible-xs-block">
                            <a href="{{ url('/auth/logout') }}">
                                <i class="fa fa-sign-out"></i> @lang('login.logout')
                            </a>
                        </li>
                    </ul>
                    
                    
                    <ul class="nav navbar-nav navbar-nav-right hidden-xs">
                        @if (Auth::guest())
					    <li><a href="{{ url('/auth/login') }}"><i class="fa fa-sign-in"></i> @lang('login.login')</a></li>
                        @else
					    <li class="dropdown">
						    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						        <i class="fa fa-user"></i> {{ Auth::user()->nome }} <span class="caret"></span>
					        </a>
						    <ul class="dropdown-menu" role="menu">
						        <!--<li class="divider"></li>-->
						        <li>
						            <a href="{{ url('/conta') }}">
						                <i class="fa fa-gear"></i> @lang('usuarios.me_title')
					                </a>
				                </li>
				                
							    <li>
							        <a href="{{ url('/auth/logout') }}">
							            <i class="fa fa-sign-out"></i> @lang('login.logout')
						            </a>
					            </li>
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
                
            </div><!--/row-->
        </div><!--/container-->


        <footer class="footer">
            <div class="container">
            
                <div class="pull-left"><img src="{{ asset('img/faculdade_senai.jpg') }}"></div>
                <div class="pull-right">
                    <p class="author">
                        <a href="{{ Config::get('app.group_url') }}" target="gppdi">Desenvolvido por GPPDi</a>
                    </p>
                </div>
                
            </div>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        -->
        <script>window.jQuery || document.write('<script src="{{ asset("/js/jquery.min.js") }}"><\/script>')</script>
        
        <script src="{{ asset('/js/app.min.js') }}"></script>
        
        @yield('js')

    </body>
</html>

