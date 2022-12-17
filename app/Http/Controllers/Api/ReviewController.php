<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\User;
use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    const COMMENTS_PER_PAGE = 5;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request )
    {
        return response()->json(
            Review::with('comments')->paginate(
                perPage: (int) $request->get('limit', self::COMMENTS_PER_PAGE),
                page: (int) $request->get('page', 1)
            )->toArray()
        );
    }

    /**
     * @param ReviewRequest $request
     * @param ReviewService $reviewService
     * @return JsonResponse
     */
    public function post(ReviewRequest $request, ReviewService $reviewService): JsonResponse
    {
        $reviewService->create(User::find(Auth::user()->getAuthIdentifier()), $request->all());

        return response()->json('success');
    }
}
