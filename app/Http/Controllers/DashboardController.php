<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $draftCount = News::whereNull('published_at')->count();
        
        $data = [
            'totalNews' => News::count(),
            'publishedNews' => News::whereNotNull('published_at')->count(),
            'draftNews' => News::whereNull('published_at')->count(),
            'totalCategories' => Category::count(),
            'recentNews' => News::latest()->take(10)->get(),
        ];

        return view('pages.dashboard', $data);
    }
}
