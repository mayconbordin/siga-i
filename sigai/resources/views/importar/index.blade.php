@extends('app')

@section('title')
@lang('importar.title') ::
@parent
@stop

@section('css')
<link href="{{ asset('/css/fileinput.min.css') }}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{ asset('/js/fileinput.min.js') }}"></script>
<script src="{{ asset('/js/fileinput_locale_pt-BR.js') }}"></script>

<script>
$(document).ready(function($) {
    $("#fileInput").fileinput({
        showUpload: true,
        showPreview: false,
        allowedFileExtensions: ['xls', 'xlsx', 'xlsm', 'xlsb'],
        language: 'pt-BR',
        uploadUrl: "{{ url('/importar') }}",
        uploadAsync: true
    });
    

    $('#fileInput').on('fileuploaded filebatchuploadsuccess', function(event, data) {
        var response = data.jqXHR.responseJSON;

        var r = response.result;
        var html = response.message + '<br>' + '<strong>Turma:</strong> ' + r.turma.nome
                 + '<br>' + '<strong>Período:</strong> ' + r.turma.data_inicio + ' a ' + r.turma.data_fim
                 + '<br>' + '<strong>Unidade Curricular:</strong> ' + r.unidade_curricular.nome;
        
        $("#alertMessage").addClass("alert-success").removeClass("alert-danger hidden")
                          .find(".message").html(html);
    });
    
    $('#fileInput').on('fileuploaderror filebatchuploaderror', function(event, data) {
        var response = data.jqXHR.responseJSON;
        var errors = [];
        
        if (typeof(response) == "undefined") {
            errors.push("Erro desconhecido");
        } else if ("errors" in response) {
            errors = response.errors;
        } else {
            for (attr in response)
                errors.push(response[attr]);
        }
        
        var msg = errors.join('<br>');
        
        $("#alertMessage").toggleClass("alert-danger alert-success hidden")
                          .find(".message").html(msg);
    });
});
</script>
@endsection

@section('content')
<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">@lang('importar.title')</div>

		<div class="panel-body">
		    <div id="alertMessage" class="alert alert-success alert-dismissible fade in hidden" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="message"></span>
            </div>
		
			<form class="form-horizontal">

                <div class="form-group">
                    <label for="fileInput" class="col-sm-2 control-label">@lang('importar.archive')</label>
                    <div class="col-sm-10">
                        <input type="file" id="fileInput" name="planilha">
                        <p class="help-block">@lang('importar.upload_info')</p>
                    </div>
                </div>

            </form> 
		</div>
	</div>
</div>
@endsection
