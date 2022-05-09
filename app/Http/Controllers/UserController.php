<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(User::all());
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
            'user' => User::create($request->post())
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $u
     * @return JsonResponse
     */
    public function show(User $u): JsonResponse
    {
        return response()->json($u);
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
     * @param User $u
     * @return JsonResponse
     */
    public function update(Request $request, User $u): JsonResponse
    {
        $u->fill($request->post())->save();
        return response()->json([
            'user' => $u
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $u
     * @return JsonResponse
     */
    public function destroy(User $u): JsonResponse
    {
        $u->delete();
        return response()->json([
            'msg' => 'User deleted'
        ]);
    }
}
