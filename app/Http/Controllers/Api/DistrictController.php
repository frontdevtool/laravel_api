<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request  ) 
    {
        //
        // dd($request);
        // return $request;

        $disrticts = District::where('city_id',$request->input('city'))->get();
        // dd($disrticts);
        if (count($disrticts) > 0) {
            return ApiResponse::sendResponse(200, 'data is rady', DistrictResource::collection($disrticts));
        }
        return ApiResponse::sendResponse(200, 'No', []);
    }
}
