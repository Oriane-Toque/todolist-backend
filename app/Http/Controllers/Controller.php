<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // methode qui me permet d'envoyer un json + code de reponse
    protected function sendJsonResponse($data, $httpStatusCode=200)
    {
        return response()->json($data, $httpStatusCode);
    }
    // methode qui me permet d'envoyer un code de reponse (sans data)
    protected function sendEmptyResponse($httpStatusCode=200)
    {
        return response('', $httpStatusCode);
    }


}
