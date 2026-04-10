<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $all_category = Category::get();

        return view('pages.categories.index', compact('all_category'));
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->name. ' ' .$request->parent_id);

        $request->merge(['slug' => $slug]);

        if ($request->filled('parent_id')) {
            $errorMessage = 'Sub-kategori dengan kategori utama ini sudah terdaftar.';
        } else {
            $errorMessage = 'Kategori utama dengan nama ini sudah terdaftar.';
        }

        $request->validate([
            'name' => 'required|max:50',
            'slug' => 'unique:categories,slug',
        ], [
            'slug.unique' => $errorMessage,
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $slug
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil disimpan!');
    }

    public function create(Request $request)
    {
        $categories = Category::whereNull('parent_id')->get();
        $isParent = $request->query('is_parent') === 'true';

        return view('pages.categories.create', compact('isParent'), compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required:author,content|max:255',
            'author' => 'required_without_all:title,content|max:100',
            'content' => 'required_without_all:title,author'
        ]);

        $news = News::findOrFail($id);
        $news->update([
            'title' => $request->title ?? '',
            'content' => $request->content ?? '',
            'category_id' => $request->category_id,
            'author' => $request->author ?? '',
        ]);

        if ($request->input('from') === 'drafts') {
            return redirect()->route('news.drafts')->with('success', 'Draft berhasil diperbarui!');
        }

        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function edit(Request $request, $id)
    {
        $parent_categories = Category::whereNull('parent_id')->get();
        $categories = Category::findOrFail($id);
        $isParent = $request->query('is_parent') === 'true';

        return view('pages.categories.edit', compact('isParent', 'categories', 'parent_categories'));
    }

    public function destroy(Request $request, $id)
    {
        $categories = Category::findOrFail($id);

        $categories->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
