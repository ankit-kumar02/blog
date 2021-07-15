<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait{
	public function apiException($request,$e)
	{
if($e instanceof ModelNotFoundException)
{	
return response()->json(['errors'=>'Product Model Not Found'],Response::HTTP_NOT_FOUND);

}
if($e instanceof NotFoundHttpException){
	return response(['errors'=>'Incorrect Route'],Response::HTTP_NOT_FOUND);
}
}

}