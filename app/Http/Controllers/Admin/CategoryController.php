<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = '/storage/' . $request->file('img')->store('uploads', 'public');
        $category = Category::create([
            'name' => $request->post('name'),
            'slug' => str_slug($request->post('name')),
            'description' => $request->post('description'),
            'img' => $path,
            'is_publish' => $request->post('is_publish'),
            'seo_title' => $request->post('seo_title'),
            'seo_description' => $request->post('seo_description'),
        ]);

        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): JsonResponse
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): JsonResponse
    {

        $category = Category::where('id', $request->post('id'))->first();
//        return response()->json($category);
        if($request->file('img')) {
            $path = '/storage/' . $request->file('img')->store('uploads', 'public');
            $category->img = $path;
        }

        $category->name = $request->post('name');
        $category->slug = str_slug($request->post('name'));
        $category->description = $request->post('description');
        $category->is_publish = $request->post('is_publish');
        $category->seo_title = $request->post('seo_title');
        $category->seo_description = $request->post('seo_description');

        $category->save();

        return response()->json($category);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(Category::all());
    }
}
