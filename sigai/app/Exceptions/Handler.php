<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use App\Exceptions\NotFoundError;
use App\Exceptions\ValidationError;
use App\Exceptions\ServerError;
use App\Exceptions\ConflictError;
use App\Exceptions\BadRequest;


use Illuminate\Routing\Route;


class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		if ($request->is('api/*')) {
		    if ($e instanceof NotFoundError) {
		        return response()->json(['errors' => [$e->getMessage()]], 404);
		    } else if ($e instanceof ValidationError) {
		        return response()->json($e->getErrors(), 422);
		    } else if ($e instanceof ServerError) {
		        return response()->json(['errors' => [$e->getMessage()]], 500);
		    } else if ($e instanceof ConflictError) {
		        return response()->json(['errors' => [$e->getMessage()]], 409);
		    } else if ($e instanceof BadRequest) {
		        return response()->json(['errors' => [$e->getMessage()]], 400);
		    }
		}
		
		//dd($request->route());
		
		
		return parent::render($request, $e);
	}

}
