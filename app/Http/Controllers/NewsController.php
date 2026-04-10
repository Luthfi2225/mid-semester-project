<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $all_news = News::with('category.parent')->get();

        return view('pages.news.index', compact('all_news'));
    }

    public function create(Request $request)
    {
        $categories = Category::whereNotNull('parent_id')->with('parent')->get();

        return view('pages.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required_without_all:author,content|max:255',
            'author' => 'required_without_all:title,content|max:100',
            'content' => 'required_without_all:title,author',
        ]);

        News::create([
            'title' => $request->title ?? '',
            'author' => $request->author ?? '',
            'content' => $request->content ?? '',
            'category_id' => $request->category_id,
            'image' => 'https://picsum.photos/640/480', // Dummy sementara
            'published_at' => null,
        ]);

        return redirect()->route('news.index')->with('success', 'Berita berhasil disimpan!');
    }

    public function edit(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $categories = Category::whereNotNull('parent_id')->get();

        $from = $request->query('from', 'index');

        return view('pages.news.edit', compact('news', 'categories', 'from'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required_without_all:author,content|max:255',
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

    public function destroy(Request $request, $id)
    {
        $news = \App\Models\News::findOrFail($id);

        $news->delete();

        if ($request->query('from') === 'drafts') {
            return redirect()->route('news.drafts')->with('success', 'Draft berita berhasil dihapus!');
        }

        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }

    public function drafts()
    {
        $draft_news = News::with('category.parent')
            ->whereNull('published_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('pages.news.drafts', compact('draft_news'));
    }

    public function publish(Request $request, $id)
    {
        $news = News::findOrFail($id);

        if (empty($news->title) || empty($news->author) || empty($news->content)) {
            return redirect()->back()->with('error', 'Gagal untuk mempublikasikan berita! Pastikan Judul, Penulis, dan Konten sudah terisi.');
        }

        $news->update([
            'published_at' => now()
        ]);

        return redirect()->route('news.drafts')->with('success', 'Berita berhasil dipublikasikan!');
    }

    public function comments()
    {
        $comments = Comment::with('news')->latest()->get();
        return view('pages.news.comments', compact('comments'));
    }

    public function destroyComment($id)
    {
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }

    public function approveComment($id)
    {
        $comment = \App\Models\Comment::findOrFail($id);

        // Asumsikan kamu punya kolom 'is_approved' di tabel comments
        $comment->update([
            'is_approved' => true
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil disetujui!');
    }
}
