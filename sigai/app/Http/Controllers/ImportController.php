<?php namespace App\Http\Controllers;

use App\Importers\XlsImport;
use App\Http\Requests\ImportarXlsRequest;
use App\Commands\ImportData;

use \Validator;
use \Input;
use \Storage;
use \Auth;

use PHPExcel;
use PHPExcel_IOFactory;

class ImportController extends Controller {

    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('permissions');
    }

	public function index()
	{
	    return view('importar.index');
	}
	
	
	public function processar(ImportarXlsRequest $request)
	{
	    if (!$request->hasFile('planilha')) {
            return response()->json(['errors' => ["O campo planilha precisa ser um arquivo."]], 500);
        }
        
        $file = $request->file('planilha');
        
        if (!$file->isValid()) {
            return response()->json(['errors' => ["A planilha enviada não é válida."]], 422);
        }
        
        $xls = new XlsImport('Excel2007', $file->getRealPath());
        $xls->readAll();
	    
	    //try {
            $this->dispatch(
                new ImportData(Auth::user(), $xls->getData())
            );
        /*} catch (\Exception $e) {
            return response()->json(['errors' => [$e->getMessage()]], 500);
        }*/
        
        return response()->json([
            'message' => 'OK',
            'result'  => null
        ]);
	}

}
