<?php

namespace App\Http\Controllers\AmoCrm\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Models\Company;
use League\OAuth2\Client\Token\AccessToken;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $company = Company::firstOrCreate(['id' => $data['id']], $data);
        return response()->json([
            'status' => true,
            'company' => $company
        ]);
    }


}
