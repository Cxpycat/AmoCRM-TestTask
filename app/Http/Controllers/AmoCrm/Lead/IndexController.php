<?php

namespace App\Http\Controllers\AmoCrm\Lead;

use App\Http\Controllers\Controller;
use League\OAuth2\Client\Token\AccessToken;

class IndexController extends Controller
{
    public function __invoke()
    {
        $leadsService = $this->getApiClient()->leads();

        try {
            $leadsCollection = $leadsService->get();
        } catch (AmoCRMApiException $e) {
            printError($e);
            die;
        }
        return json_encode($leadsCollection);
    }


}
