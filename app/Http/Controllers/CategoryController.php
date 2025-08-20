<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(string $slug): View
    {
        $category = Category::where([
                ['slug', '=', $slug],
                ['is_publish', '=', 1]
            ])
            ->with(['services' => function ($query) { $query->where('is_publish', '=', 1); }])
            ->first();

//        Event::with(['participants' => function ($query) { $query->where('IDUser', 1); }])->get();
        if($category) {
            return view('templates.service', [
                'category' => $category
            ]);
        }
        else {
            abort(404);
        }
    }
}
