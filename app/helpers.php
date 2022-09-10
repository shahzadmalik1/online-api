<?php
function apiResponse($message="", $status_code=200, $code=1000, $data=[])
{
    return [
                "message" => $message, 
                "status_code" => $status_code, 
                "code" => $code, 
                "data" => $data
            ];
}

function apiErrorResponse($message="", $status_code=500, $code=0, $errors)
{
    return [
                "message" => $message, 
                "status_code" => $status_code, 
				"code" => $code,
				"errors"=>$errors
            ];
}
