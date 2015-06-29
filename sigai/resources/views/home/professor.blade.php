@extends('app')

@section('content')
<div class="col-xs-12">

    @if ($daysEndMonth < 5 && sizeof($diarios) > 0)
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 id="oh-snap!-you-got-an-error!">Você tem diários de classe para fechar!</h4>

        <ul class="list-group">
            @foreach ($diarios as $d)
            <a href="{{ url('/unidades_curriculares/'.$d->unidade_curricular_id.
                            '/turmas/'.$d->turma_id.'/#diarios') }}" class="list-group-item">
                Fechar diário da turma {{ $d->nome }}
            </a>
            @endforeach
        </ul>
    </div>
    @endif
	
	<div class="row">
	    <div class="col-xs-6">
	        <div class="panel panel-default">
		        <div class="panel-heading">Minhas Turmas</div>

		        <div class="panel-body">
		            <div class="list-group">
		                @foreach ($turmas as $turma)
                        <a href="{{ url('/unidades_curriculares/'.$turma->unidade_curricular_id.
                                        '/turmas/'.$turma->id) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $turma->nome }}</h4>
                            <p class="list-group-item-text">
                            {{ $turma->data_inicio->format('d/m/Y') }} - {{ $turma->data_fim->format('d/m/Y') }}
                            </p>
                        </a>
                        @endforeach
                    </div>
		        </div>
	        </div>
	    </div>
	    
	    <div class="col-xs-6">
	        <div class="panel panel-default">
		        <div class="panel-heading">Próximas Aulas</div>

		        <div class="panel-body">
		            <div class="list-group">
		                @foreach ($nextAulas as $aula)
                        <a href="{{ url('/unidades_curriculares/'.$aula->turma->unidade_curricular_id.
                                        '/turmas/'.$aula->turma->id.'/aulas/'.$aula->data->format('Y-m-d')) }}"
                           class="list-group-item {{ $aula->data->isToday() ? 'active' : '' }}">
                            <h4 class="list-group-item-heading">{{ $aula->data->format('d/m/Y') }}</h4>
                            <p class="list-group-item-text">
                            {{ $aula->turma->nome }}
                            </p>
                        </a>
                        @endforeach
                    </div>
		        </div>
	        </div>
	    </div>
	</div>
	
	
</div>
@endsection
