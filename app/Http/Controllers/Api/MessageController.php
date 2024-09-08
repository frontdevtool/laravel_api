<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NewMessageRequest $request)
    // public function __invoke(Request $request)
    {
        //
        // return $request;
        $data = $request->validated();
        // return $data;
        // $data = $request;
        $record = Message::create($data);
        if ($record) {
            return ApiResponse::sendResponse(200, 'data has stored', []);
        }
        return ApiResponse::sendResponse(202, 'store is error', []);

        // return $data;
    }
}
