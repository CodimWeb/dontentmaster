<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $seo = Seo::where('page_name', '=', 'home')->first();

        $categories = Category::where('is_publish', '=', '1')->get();
        return view('templates.index', [
            'seo' => $seo,
            'categories' => $categories
        ]);
    }
}
