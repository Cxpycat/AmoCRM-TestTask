<?php

namespace App\Http\Controllers\AmoCrm\Contact;

use App\Http\Controllers\Controller;
use League\OAuth2\Client\Token\AccessToken;

class IndexController extends Controller
{
    public function __invoke()
    {
        $contactsService = $this->getApiClient()->contacts();

//Получим сделки и следующую страницу сделок
        try {
            $contactsCollection = $contactsService->get();
        } catch (AmoCRMApiException $e) {
            printError($e);
            die;
        }
        return json_encode($contactsCollection);
    }


}
