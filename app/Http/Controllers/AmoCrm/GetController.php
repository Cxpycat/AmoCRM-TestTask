<?php

namespace App\Http\Controllers\AmoCrm;

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\EntitiesServices\Leads;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Exception;
use Symfony\Component\Dotenv\Dotenv;
use AmoCRM\OAuth2\Client\Provider\AmoCRM;


class GetController extends Controller
{

    public function __invoke()
    {
        return view('main');
    }


}
