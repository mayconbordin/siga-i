@extends('app')

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
        uploadUrl: "{{ url('/importar') }}"
    });
});
</script>
@endsection

@section('content')
<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">Importação de Planilha</div>

		<div class="panel-body">
			<form class="form-horizontal">

                <div class="form-group">
                    <label for="fileInput" class="col-sm-2 control-label">Arquivo</label>
                    <div class="col-sm-10">
                        <input type="file" id="fileInput" name="planilha">
                        <p class="help-block"></p>
                    </div>
                </div>

            </form> 
		</div>
	</div>
</div>
@endsection
