<?php namespace Nhanduc\Core\Func\Exceptions;
/** :: Nhanduc ::
***********************************************************************************************************************
* @source  : JsonValidation.php
* @project :
*----------------------------------------------------------------------------------------------------------------------
* VER  DATE           AUTHOR          DESCRIPTION
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* 1.0  2020/11/12     Name_0070
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* Project Description
* Copyright(c) 2020 Nhanduc Ltd. ,All rights reserved.
**********************************************************************************************************************/

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Contracts\Validation\Validator;
use Nhanduc\Core\Func\Traits\ApiResponse;

class JsonValidation extends ExceptionHandler
{
    use ApiResponse;
    /**
     * validate object call reported.
     *
     * @var object
    */
    protected $validator;

     /**
     * Contrustor Json Validate Custom Reported.
     *
     * @param Validator $validator
    */
    public function __construct(Validator $validator) {
        $this->validator = $validator;
    }

    /**
     * Render an exception into an JSON response.
     *
     * @return \Symfony\Component\JsonFoundation\Response
     *
     * @throws \Throwable
     */
    public function render() {
        return $this->sendFailedResponse(
            $this->validator->errors()->first(),
            $this->statusUnprocessableEntity
        );
    }
}
