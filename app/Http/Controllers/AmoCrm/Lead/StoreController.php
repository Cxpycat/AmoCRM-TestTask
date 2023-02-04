<?php

namespace App\Http\Controllers\AmoCrm\Lead;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\StoreRequest;
use App\Models\Lead;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $lead = Lead::firstOrCreate(['id' => $data['id']], $data);

        return response()->json([
            'status' => true,
        ]);
    }


}
