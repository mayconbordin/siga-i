<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\ArduinoConfigRequest;
use \DB;
use \Lang;
use \Input;

class ArduinoController extends Controller
{
    public function __construct()
    {

    }

	public function config(ArduinoConfigRequest $request)
	{
        $clientId = $request->get('client_id');

        // save heartbeat

        return Response::json([
            'urlOauth'            => 'api/oauth/access_token',
            'urlReport'           => 'api/chamada',
            'readBufferFlushPerc' => config('arduino.readBufferFlushPerc'),
            'reportInterval'      => config('arduino.reportInterval'),
            'reportTimeout'       => config('arduino.reportTimeout'),
            'bootstrapTimeout'    => config('arduino.bootstrapTimeout'),
            'version'             => config('arduino.version')
        ]);
	}
}
