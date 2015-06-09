@extends('app')
 
@section('title')
@lang('unidades_curriculares.title') ::
@parent
@stop


@section('js')
<script>

$(document).ready(function($) {
    $(".unidades-curriculares .remove").click(function() {
        var tr = $($(this).parent().parent());
        var id = tr.data('id');
        
        bootbox.confirm("@lang('unidades_curriculares.remove_message')", function(result) {
            if (result == true) {
                $.ajax({
                    url: "{{ url('api/unidades_curriculares') }}/" + id,
                    method: 'DELETE'
                }).done(function() {
                    bootbox.alert("@lang('unidades_curriculares.remove_success')");
                    tr.remove();
                }).fail(function() {
                    bootbox.alert("@lang('unidades_curriculares.remove_error')");
                });
            }
        });
    });
});
</script>
@endsection

@section('content')
<div class="col-xs-12">
    @include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        <li class="active">@lang('unidades_curriculares.title')</a></li>
    </ol>
    
    <a class="btn btn-primary" href="{{ url('unidades_curriculares/criar') }}">
        <i class="fa fa-plus"></i> @lang('unidades_curriculares.new_uc')
    </a>

    <!-- Lista UCs -->
    <table class="unidades-curriculares table table-striped table-hover" style="border-collapse:collapse;">
        <thead>
            <tr>
                <th>@lang('unidades_curriculares.id')</th>
                <th>@lang('unidades_curriculares.nome')</th>
                <th>@lang('unidades_curriculares.sigla')</th>
                <th class="text-center">@lang('unidades_curriculares.carga_horaria')</th>
                <th class="text-center">@lang('general.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unidadesCurriculares as $uc)
            <tr data-id="{{ $uc->id }}">
                <td scope="row">{{ $uc->id }}</td>
                <td><a href="#" data-toggle="collapse" data-target="#uc-turmas-{{ $uc->id }}" class="accordion-toggle">
                    {{ $uc->nome }}</a>
                </td>
                <td>{{ $uc->sigla }}</td>
                <td class="text-center">{{ $uc->carga_horaria }}</td>
                <td class="text-center">
                    <a href="{{ url('/unidades_curriculares', ['id' => $uc->id]) }}"
                       class="btn btn-default btn-xs edit">
                        <i class="fa fa-pencil"></i> @lang('general.edit')
                    </a>
                    <button class="btn btn-default btn-xs remove">
                        <i class="fa fa-remove"></i> @lang('general.remove')
                    </button>
                </td>
            </tr>
            
            <tr>
                <td colspan="6" class="hiddenRow">
                    <div class="accordian-body collapse" id="uc-turmas-{{ $uc->id }}">

                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>@lang('turmas.single_title')</th>
                                    <th>@lang('turmas.data_inicio')</th>
                                    <th>@lang('turmas.data_fim')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($uc->turmas as $t)
                                <tr>
                                    <td>
                                        <a href="{{ url('/unidades_curriculares/'.$uc->id.'/turmas/'.$t->id) }}">
                                        {{ $t->nome }}
                                        </a>
                                    </td>
                                    <td>{{ $t->data_inicio->format('d/m/Y') }}</td>
                                    <td>{{ $t->data_fim->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-container text-center">
        <?php echo $unidadesCurriculares->render(); ?>
    </div>

</div>
@endsection
