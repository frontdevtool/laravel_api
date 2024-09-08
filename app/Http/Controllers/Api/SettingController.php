<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $settings = Setting::find(3);
        // dd($settings);
        if ($settings) {
            return ApiResponse::sendResponse(200 , 'data is ready',new SettingResource($settings));
        }
        return ApiResponse::sendResponse(204 , 'data Error',null);
        // return $settings;
        // return new SettingResource($settings)  ;
        // return SettingResource::collection(ApiResponse::sendResponse(204, 'data Error', []));
    }
}
