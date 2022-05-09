<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Room::all());
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
            'room' => Room::create($request->post())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Room $r
     * @return JsonResponse
     */
    public function show(Room $r): JsonResponse
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
     * @param Room $r
     * @return JsonResponse
     */
    public function update(Request $request, Room $r): JsonResponse
    {
        $r->fill($request->post())->save();
        return response()->json([
            'room' => $r
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Room $r
     * @return JsonResponse
     */
    public function destroy(Room $r): JsonResponse
    {
        $r->delete();
        return response()->json([
            'msg' => 'Room deleted'
        ]);
    }
}
