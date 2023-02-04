<?php

namespace App\Http\Controllers\AmoCrm\Company;

use App\Http\Controllers\Controller;
use League\OAuth2\Client\Token\AccessToken;

class IndexController extends Controller
{
      public function __invoke()
    {
        $companiesService = $this->getApiClient()->companies();


//Получим сделки и следующую страницу сделок
          try {
              $companiesCollection = $companiesService->get();
          } catch (AmoCRMApiException $e) {
              printError($e);
              die;
          }
          return json_encode($companiesCollection);
    }


}
