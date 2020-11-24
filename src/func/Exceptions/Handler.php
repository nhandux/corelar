<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Nhanduc\Core\Func\Traits\ApiResponse;

class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $exception) {
            parent::report($exception);
        });

        $this->renderable(function (Throwable $exception, $request) { 
            if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {

                return $this->sendFailedResponse(
                    'Model not found.',
                    $this->statusNotFound
                );
            }
    
            if ($exception instanceof NotFoundHttpException && $request->wantsJson()) {
                $url = request()->fullUrl();
    
                return $this->sendFailedResponse(
                    "The requested URL [$url] was not found on this server.",
                    $this->statusNotFound
                );
            }
    
            if ($exception instanceof MethodNotAllowedHttpException && $request->wantsJson()) {
    
                return $this->sendFailedResponse(
                    $exception->getMessage(),
                    $this->statusMethodNotAllowed
                );
            }

            if ($exception instanceof UnauthorizedException && $request->wantsJson()) {
                
                return $this->sendFailedResponse(
                    $exception->getMessage(),
                    $this->statusMethodNotAllowed
                );
            }
    
            // return parent::render($request, $exception);
        });
    }
}
