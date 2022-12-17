<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\User;
use App\Services\CommentServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * @param CommentRequest $request
     * @param CommentServiceInterface $commentService
     * @return JsonResponse
     */
    public function post(CommentRequest $request, CommentServiceInterface $commentService): JsonResponse
    {
        $commentService->create(User::find(Auth::user()->getAuthIdentifier()), $request->all());

        return response()->json('success');
    }
}
