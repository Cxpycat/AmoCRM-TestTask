<?php

namespace App\Http\Controllers\AmoCrm\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Models\Contact;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $contact = Contact::firstOrCreate(['id' => $data['id']], $data);
        return response()->json([
            'status' => true,
        ]);
    }


}
