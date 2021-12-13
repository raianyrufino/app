<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;

class Handler extends ExceptionHandler
{
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */

    public function render($request, Throwable $exception)
    {  
        $codigo = 500;
        $resposta = ['mensagem' => 'Ocorreu um erro no sistema.'];
        
        if ($exception instanceof \App\Exceptions\BusinessException)  {
            $codigo = $exception->getCode();
            $resposta = ['mensagem' => $exception->getMessage()];
        }

        return response()->json($resposta, $codigo);
    }
}