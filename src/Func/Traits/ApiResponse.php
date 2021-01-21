<?php namespace Nhanduc\Core\Func\Traits;
/** :: Nhanduc ::
***********************************************************************************************************************
* @source  : ApiResponse.php
* @project :
*----------------------------------------------------------------------------------------------------------------------
* VER  DATE           AUTHOR          DESCRIPTION
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* 1.0  2020/11/12     Name_0070
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* Project Description
* Copyright(c) 2020 Nhanduc Ltd. ,All rights reserved.
**********************************************************************************************************************/
trait ApiResponse
{
	// 200 OK - Response to a successful GET, PUT, PATCH or DELETE.
	// Can also be used for a POST that doesn't result in a creation.
	protected $statusOk = 200;

	// 201 Created - Response to a POST that results in a creation.
	// Should be combined with a Location header pointing to the location of the new resource
	protected $statusCreated = 201;

	// 204 No Content - Response to a successful request that won't be returning a body (like a DELETE request)
	protected $statusNoContent = 204;

	// 304 Not Modified - Used when HTTP caching headers are in play
	protected $statusNotModified = 304;

	// 400 Bad Request - The request is malformed, such as if the body does not parse
	protected $statusBadRequest = 400;

	// 401 Unauthorized - When no or invalid authentication details are provided.
	// Also useful to trigger an auth popup if the API is used from a browser
	protected $statusUnauthorized = 401;

	// 403 Forbidden - When authentication succeeded but authenticated user doesn't have access to the resource
	protected $statusForbidden = 403;

	// 404 Not Found - When a non-existent resource is requested
	protected $statusNotFound = 404;

	// 405 Method Not Allowed - When an HTTP method is being requested that isn't allowed for the authenticated user
	protected $statusMethodNotAllowed = 405;

	// 410 Gone - Indicates that the resource at this end point is no longer available.
	// Useful as a blanket response for old API versions
	protected $statusGone = 410;

	// 415 Unsupported Media Type - If incorrect content type was provided as part of the request
	protected $statusUnsupportedMediaType = 415;

	// 422 Unprocessable Entity - Used for validation errors
	protected $statusUnprocessableEntity = 422;

	// 429 Too Many Requests - When a request is rejected due to rate limiting
	protected $statusTooManyRequests = 429;

	// 500 Internal Server Error
	protected $statusInternalServerError = 500;

	/**
	 * When an API call is successful
	 */
    public function sendSuccessResponse($response, $status, $msg = 'OK')
    {
        return response()->json([
			'status' => [
				'code' => $status,
				'msg' => $msg
			],
			'data' => $response
		], $status);
    }

	/**
	 * When an API call is rejected due to invalid data or call conditions
	 */
    public function sendFailedResponse($errors, $status)
    {
        return response()->json([
			'status' => [
				'code' => $status,
				'msg' => $errors
			],
			'data' => []
		], $status);
	}

	/**
	 * When an API call fails due to an error on the server.
	 */
    public function sendErrorResponse($message, $status)
    {
        return response()->json([
			'status' => 'error',
			'message' => $message
		], $status);
    }
}
