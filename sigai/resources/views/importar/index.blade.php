@extends('app')

@section('title')
@lang('importar.title') ::
@parent
@stop

@section('js')
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
<div class="col-xs-12">
    <button id="startHelp" class="help-button btn btn-large btn-success pull-right">
        <i class="fa fa-question-circle"></i> Ajuda
    </button>
   
    <div class="clearfix"></div>

	<div data-step="1" data-intro= "@lang('help.painel')" class="panel panel-default">
		<div class="panel-heading">@lang('importar.title')</div>
		<div class="panel-body">
		    <div id="alertMessage" class="alert alert-success alert-dismissible fade in hidden" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="message"></span>
            </div>
       
<form data-step="5" data-intro="@lang('help.enviar')" class="form-horizontal">

                <div  data-step="4" data-intro="@lang('help.aviso')"class="form-group">
                    <label for="fileInput"  class="col-sm-2 control-label">@lang('importar.archive')</label></h1>
                    <div data-step="2" data-intro="@lang('help.procurar')" class="col-sm-10">
                        <input type="file" id="fileInput" name="planilha">
                        <p data-step="3" data-intro="@lang('help.formato')" class="help-block">@lang('importar.upload_info')</p>
                    </div>
                </div>


            </form> 
		</div>
	</div>
</div>
@endsection
