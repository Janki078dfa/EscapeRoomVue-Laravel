<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Review::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([
            'review' => Review::create($request->post())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Review $r
     * @return JsonResponse
     */
    public function show(Review $r): JsonResponse
    {
        return response()->json($r);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Review $r
     * @return JsonResponse
     */
    public function update(Request $request, Review $r): JsonResponse
    {
        $r->fill($request->post())->save();
        return response()->json([
            'review' => $r
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $review = Review::find($id);
        $review->delete();

        return response()->json([
            'msg' => 'Review deleted'
        ]);
    }
}
