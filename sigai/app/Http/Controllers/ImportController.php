<?php namespace App\Http\Controllers;

use App\Importers\XlsImport;
use App\Http\Requests\ImportarXlsRequest;
use App\Commands\ImportData;

use \Validator;
use \Input;
use \Storage;
use \Auth;
use \Lang;

use PHPExcel;
use PHPExcel_IOFactory;

class ImportController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions');
    }

	public function index()
	{
	    return view('importar.index');
	}
	
	
	public function processar(ImportarXlsRequest $request)
	{
	    if (!$request->hasFile('planilha')) {
            return response()->json(['errors' => [Lang::get('importar.wrong_format')]], 500);
        }
        
        $file = $request->file('planilha');

        if (!$file->isValid()) {
            return response()->json(['errors' => [Lang::get('importar.invalid')]], 422);
        }
        
        $xls = new XlsImport($file->getRealPath());
        $xls->readAll();
        $data = $xls->getData();
	    
	    try {
            $this->dispatch(
                new ImportData(Auth::user(), $data)
            );
        } catch (\Exception $e) {
            return response()->json(['errors' => [Lang::get('importar.error')]], 500);
        }
        
        return response()->json([
            'message' => Lang::get('importar.success'),
            'result'  => [
                'turma'              => $data['turma'],
                'unidade_curricular' => $data['unidade_curricular']
            ]
        ]);
	}

}
