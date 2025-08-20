<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $seo = Seo::where('page_name', '=', 'home')->first();
        return response()->json($seo);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $seo = Seo::create([
            'seo_title' => $request->post('seo_title'),
            'seo_description' => $request->post('seo_description'),
            'page_name' => 'home',
        ]);
        return response()->json($seo::where('id', $seo->id)->first());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $page_name)
    {
        $seo = Seo::where('page_name', '=', $page_name)->first();
        $seo->seo_title = $request->post('seo_title');
        $seo->seo_description = $request->post('seo_description');
        $result = $seo->save();
        return response()->json([
            'result' => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
