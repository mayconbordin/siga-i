@extends('app')
 
@section('title')
@choice('cursos.title', 2) ::
@parent
@stop

@section('js')
<script>
$(document).ready(function($) {
});
</script>
@endsection

@section('content')
<div class="col-xs-12">
	@include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@choice('cursos.title', 2)</li>
    </ol>
    
    <button type="button" class="btn btn-primary" id="openNewCurso">
        <i class="fa fa-plus"></i> @lang('cursos.new')
    </button>
    
    @include('cursos.criar_modal')
  
    <!-- Lista Cursos -->
    <table class="table" id="cursos">
        <thead>
            <tr>
                <th>@lang('cursos.id')</th>
                <th>@lang('cursos.nome')</th>
                <th>@lang('cursos.sigla')</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr data-id="{{ $curso->id }}">
                <th scope="row">{{ $curso->id }}</th>
                <td>{{ $curso->nome }}</td>
                <td>{{ $curso->sigla }}</td>
                <td class="text-center">
                    <button class="btn btn-default btn-xs edit">
                        <i class="fa fa-pencil-square-o"></i> @lang('general.edit')
                    </button>
                    
                    <button class="btn btn-danger btn-xs remove">
                        <i class="fa fa-remove"></i> @lang('general.remove')
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-container text-center">
        <?php echo $cursos->render(); ?>
    </div>
</div>
@endsection
