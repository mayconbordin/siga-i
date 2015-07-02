@extends('app')
 
@section('title')
@if (isset($aula))
    @lang('aulas.single_title') {{ $aula->data->format('d/m/Y') }}
@else
    @lang('turmas.new')
@endif
 ::
@parent
@stop

@section('js')
<script>

var Aula = (function() {
    var Model = {
        saveChamada: function(chamada, success, error) {
            $.ajax({
                url: Router.get('base') + '/chamada',
                method: 'POST',
                data: JSON.stringify({ chamada: chamada }),
                dataType: 'json',
                contentType: "application/json; charset=utf-8"
            }).done(function(result) {
                success(result);
            }).fail(function(xhr) {
                error(xhr.responseJSON, xhr);
            });
        }
    };

    return {
        init: function() {
            $("#aulaEditBtn").click(this.onClickEdit);

            $("#aulaAmbiente").typeahead({
                onSelect: function(item) {
                    $("#aulaAmbienteId").val(item.value);
                },
                ajax: {
                    url: Router.get('ambientes'),
                    displayField: "nome",
                    valueField: "id",
                    method: "get",
                    preDispatch: function (query) {
                        return {
                            query: query
                        }
                    }
                }
            });

            // ativa timepickers
            $('.timepicker').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false,
                defaultTime: false
            });
        
            $("#switchChamadas").click(this.onSwitchChamadasClick);
            $("#chamada .checkRow input[type=checkbox]").change(this.onCheckRowClick);
            $(".saveChamada").click(this.onSaveChamadaClick);
        },
        
        onClickEdit: function() {
            $("#aulaForm fieldset").prop('disabled', $(this).hasClass("editing"));
            $(this).toggleClass("editing btn-primary btn-danger");
            
            if ($(this).hasClass("editing")) {
                $(this).html('@lang("general.cancel")');
            } else {
                $(this).html('@lang("general.edit")');
            }
        },

        onSwitchChamadasClick: function(e) {
            var action = $(e.target).data('action');

            if (action == 'p') {
                $("#chamada input[type=checkbox]").bootstrapToggle('on');
            } else {
                $("#chamada input[type=checkbox]").bootstrapToggle('off');
            }
        },
        
        onCheckRowClick: function() {
            var tr = $(this).parent().parent().parent();
                
            if ($(this).prop('checked')) {
                $(tr).find(".period input[type=checkbox]").bootstrapToggle('on');
            } else {
                $(tr).find(".period input[type=checkbox]").bootstrapToggle('off');
            }
        },
        
        onSaveChamadaClick: function() {
            var $btn = $(this).button('loading');
            var trs = $("#chamada table tbody tr");
            var data = [];
            
            $(trs).each(function(i, tr) {
                var matricula = $(tr).data('matricula');
                var periods = [];
                
                $(tr).find('.period input[type=checkbox]').each(function(j, cb) {
                    periods[j] = $(cb).prop('checked');
                });
                
                if (periods.length == 4) {
                    data.push({matricula: matricula, periods: periods});
                }
            });

            Model.saveChamada(data, function(result) {
                $btn.button('reset')
            }, function(r) {
                Modal.error(r.errors.join('<br>'));
                $btn.button('reset')
            });
        
        }
    };

})();


$(document).ready(function($) {
    Router.register('base', "{{ url('api/unidades_curriculares/'.$aula->turma->unidade_curricular_id.
                                    '/turmas/'.$aula->turma->id.'/aulas/'.$aula->data->format('Y-m-d')) }}");
    Router.register('ambientes', "{{ url('api/ambientes') }}");
    Aula.init();
});
</script>
@endsection


@section('content')
<div class="col-xs-12">

    @include('utils.alerts')
    
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">@lang('general.home')</a></li>
        
        @if (Auth::user()->hasRole('coordenador'))
        <li><a href="{{ url('/unidades_curriculares') }}">@lang('unidades_curriculares.title')</a></li>
        <li><a href="{{ url('/unidades_curriculares', ['id' => $aula->turma->unidadeCurricular->id]) }}"
            >{{ $aula->turma->unidadeCurricular->nome }}</a>
        </li>
        @else
        <li>@lang('unidades_curriculares.title')</li>
        <li>{{ $aula->turma->unidadeCurricular->nome }}</li>
        @endif
        
        
        <li><a href="{{ url('/unidades_curriculares/'.$aula->turma->unidadeCurricular->id.'/turmas/'.$aula->turma->id) }}"
            >@lang('turmas.single_title') {{ $aula->turma->nome }}</a>
        </li>
        
        <li class="active">
        @if (isset($aula))
            @lang('aulas.single_title') {{ $aula->data->format('d/m/Y') }}
        @else
            @lang('aulas.new')
        @endif
        </li>
    </ol>
    
    
    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            
            <li role="presentation" class="active"><a href="#main" aria-controls="main"
                role="tab" data-toggle="tab">@lang('aulas.single_title')</a></li>    
           
            @if (isset($aula) && Auth::user()->can('edit-own-aula'))
            <li role="presentation"><a href="#chamada" aria-controls="chamada"
                role="tab" data-toggle="tab">@lang('aulas.chamada')</a></li>
            @endif
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
    
            {{-- Aba principal --}}
            <div role="tabpanel" class="tab-pane active" id="main">
                <div class="panel panel-tabbed">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @if (isset($aula) && Auth::user()->can('edit-own-aula'))
                                <a id="aulaEditBtn" href="#" title="" class="btn btn-primary btn-xs edit">
                                    @lang('general.edit')
                                </a>
                                @endif
                            </div>
                        </div>
                    
                        @include('aulas.form')
                    </div>
                </div>
            </div>
            
            @if (isset($aula) && Auth::user()->can('edit-own-aula'))
            
            {{-- Aba de chamada --}}
            <div role="tabpanel" class="tab-pane" id="chamada">
                
                <div class="tab-actions row">
                    <div class="col-sm-6 tab-actions-left">
                        <button id="saveChamada-1" class="saveChamada btn btn-success"
                                data-loading-text="@lang('general.saving')...">
                            @lang('general.save')</button>
                    </div>
                    <div class="col-sm-6 tab-actions-right">
                        <div class="pull-right">
                            <strong>Aplicar a todos:</strong>
                            <div id="switchChamadas" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-success" data-action="p">
                                    <input type="radio" autocomplete="off"> P
                                </label>
                                <label class="btn btn-danger" data-action="f">
                                    <input type="radio" autocomplete="off"> F
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-right">#</th>
                            <th>@lang('alunos.matricula')</th>
                            <th>@lang('alunos.nome')</th>
                            <th class="text-center">@lang('alunos.status')</th>
                            <th class="text-center cell-gray">P1</th>
                            <th class="text-center cell-gray">P2</th>
                            <th class="text-center cell-gray">P3</th>
                            <th class="text-center cell-gray">P4</th>
                            <th class="text-center">@lang('general.all')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chamadas as $index => $c)
                        <tr data-matricula="{{ $c->matricula }}" {{ $c->isNormal ? '' : 'class=row-inactive' }}>
                            <th class="text-right" scope="row">{{ ($index + 1) }}</th>
                            <th>{{ $c->matricula }}</th>
                            <td>{{ $c->nome }}</td>
                            <td class="text-center">
                                @if ($c->status == App\Models\Aluno::STATUS_NORMAL)
                                <span class="label label-default">{{ $c->status }}</span>
                                @elseif ($c->status == App\Models\Aluno::STATUS_CANCELADO)
                                <span class="label label-danger">{{ $c->status }}</span>
                                @else
                                <span class="label label-warning">{{ $c->status }}</span>
                                @endif
                            </td>
                            
                        @if ($c->isNormal == true)
                            @foreach(['p1', 'p2', 'p3', 'p4'] as $p)
                            <td class="text-center cell-gray period period-{{ $p }}">
                                <input type="checkbox" {{ ($c[$p] || $c[$p] == null) ? 'checked' : '' }}
                                       data-toggle="toggle"
                                       data-size="mini" data-onstyle="success"
                                       data-offstyle="danger" data-on="P" data-off="F">
                            </td>
                            @endforeach
                            
                            <td class="text-center checkRow">
                                <input type="checkbox" {{ ($c->presencas > 2) ? 'checked' : '' }}
                                       data-toggle="toggle"
                                       data-size="mini" data-onstyle="success"
                                       data-offstyle="danger" data-on="P" data-off="F">
                            </td>
                        @else
                            @for ($i=0; $i<4; $i++)
                            <td class="cell-gray"></td>
                            @endfor
                            <td></td>
                        @endif
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="tab-actions row">
                    <div class="col-sm-6 tab-actions-left">
                        <button id="saveChamada-2" class="saveChamada btn btn-success"
                                data-loading-text="@lang('general.saving')...">
                            @lang('general.save')</button>
                    </div>
                </div>
                
            </div>
            
            @endif
            
        </div><!-- /.tab-content -->

    </div><!-- /.tabpanel -->
    
</div>
@endsection
