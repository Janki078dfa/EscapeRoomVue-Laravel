<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Booking::all());
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
            'booking' => Booking::create($request->post())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Booking $b
     * @return JsonResponse
     */
    public function show(Booking $b): JsonResponse
    {
        return response()->json($b);
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
     * @param Booking $b
     * @return JsonResponse
     */
    public function update(Request $request, Booking $b): JsonResponse
    {
        $b->fill($request->post())->save();
        return response()->json([
            'booking' => $b
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Booking $b
     * @return JsonResponse
     */
    public function destroy(Booking $b): JsonResponse
    {
        $b->delete();
        return response()->json([
            'msg' => 'Booking deleted'
        ]);
    }
}
