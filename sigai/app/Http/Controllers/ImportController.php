<?php namespace App\Http\Controllers;

use App\Exceptions\XlsImportException;
use App\Importers\XlsImport;
use App\Http\Requests\ImportarXlsRequest;

use App\Services\Contracts\ImportServiceContract;
use \Validator;
use \Input;
use \Storage;
use \Auth;
use \Lang;
use \Log;

class ImportController extends Controller
{
    protected $service;

    public function __construct(ImportServiceContract $service)
    {
        $this->middleware('auth');
        $this->middleware('permissions');

        $this->service = $service;
    }

	public function index()
	{
	    return view('importar.index');
	}
	
	
	public function processar(ImportarXlsRequest $request)
	{
        $read_file_start = microtime(true);

        if (!$request->hasFile('planilha')) {
            return response()->json(['errors' => [Lang::get('importar.wrong_format')]], 500);
        }
        
        $file = $request->file('planilha');

        if (!$file->isValid()) {
            return response()->json(['errors' => [Lang::get('importar.invalid')]], 422);
        }

        $read_file_end = microtime(true);

        $parse_xml_start = microtime(true);

        try {
            $xls = new XlsImport($file->getRealPath());
            $xls->readAll();
            $data = $xls->getData();
        } catch (\PHPExcel_Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e, 'trace' => $e->getTrace()]);
            return response()->json(['errors' => [Lang::get('importar.excel_error')]], 500);
        } catch (XlsImportException $e) {
            Log::error($e->getMessage(), ['exception' => $e, 'trace' => $e->getTrace()]);
            return response()->json(['errors' => [$e->getMessage()]], 500);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e, 'trace' => $e->getTrace()]);
            return response()->json(['errors' => [Lang::get('importar.excel_error')]], 500);
        }

        $parse_xml_end = microtime(true);

        $save_data_start = microtime(true);

	    try {
            $this->service->importExcel(Auth::user(), $data);
        } catch (\Exception $e) {
            return response()->json(['errors' => [Lang::get('importar.error')]], 500);
        }

        $save_data_end = microtime(true);

        // performance metrics
        $read_file_time = $read_file_end - $read_file_start;
        $parse_xml_time = $parse_xml_end - $parse_xml_start;
        $save_data_time = $save_data_end - $save_data_start;
        
        return response()->json([
            'message' => Lang::get('importar.success'),
            'result'  => [
                'turma'              => $data['turma'],
                'unidade_curricular' => $data['unidade_curricular']
            ],
            'performance' => [
                'read_file' => "$read_file_time seconds",
                'parse_xml' => "$parse_xml_time seconds",
                'save_data' => "$save_data_time seconds"
            ]
        ]);
	}

}
