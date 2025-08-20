<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
//
        return response()->json(Service::all());
    }

    public function getByCategory(string $category_id): JsonResponse
    {
        return response()->json(Service::where('category_id', $category_id)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $service = Service::create([
            'name' => $request->post('name'),
            'category_id' => $request->post('category_id'),
            'is_publish' => $request->post('is_publish'),
            'price' => $request->post('price'),
            'is_price_from' => $request->post('is_price_from'),
            'is_price_individual' => $request->post('is_price_individual'),
        ]);

        return response()->json($service);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service): JsonResponse
    {
        return response()->json($service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service): JsonResponse
    {
        $service->update($request->all());
        return response()->json($service);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): JsonResponse
    {
        $service->delete();
        return response()->json(Service::where('category_id', $service->category_id)->get());
    }
}
