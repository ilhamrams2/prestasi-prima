<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContentManagementController extends Controller
{

    public function gallery()
{

    $galleries = Gallery::all();


    return view('news.backend.pages.gallery', compact('galleries'));
}






    public function index(Request $request)
    {
        $query = News::query();


        if ($request->category) {
            $query->where('category', $request->category);
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->date) {
            $query->whereDate('published_at', $request->date);
        }

        $news = $query->latest()->paginate(12);

        return view('news.backend.pages.dashboard', compact('news'));
    }
 public function news()
    {
        $news = News::latest()->paginate(9); // ambil data berita
        return view('news.backend.pages.news', compact('news'));
    }
public function show($id)
{
    $newsItem = News::findOrFail($id);
    return view('news.backend.pages.newsopen', compact('newsItem'));
}

  public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required',
            'category'     => 'required|string',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'published_at' => 'nullable|date',
            'status'       => 'required|in:draft,published',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('news.index')
                         ->with('success', 'Berita berhasil ditambahkan.');
    }

      public function edit(News $news)
    {
        return view('news.backend.pages.edit', compact('news'));
    }

public function update(Request $request, News $news)
{
    $validated = $request->validate([
        'title'        => 'required|string|max:255',
        'content'      => 'required',
        'category'     => 'required|string',
        'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'published_at' => 'nullable|date',
        'status'       => 'required|in:draft,published',
    ]);

    if ($request->hasFile('image')) {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $validated['image'] = $request->file('image')->store('news', 'public');
    } else {
        $validated['image'] = $news->image;
    }

    $news->update($validated);

    return redirect()
        ->route('news.index')
        ->with('success', 'Berita berhasil diperbarui.');
}


    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function splashscreen($screen)
    {
        $screens = [1, 2, 3, 4];

        if (!in_array($screen, $screens)) {
            abort(404, 'Splash screen not found.');
        }

        return view('news.backend.pages.news_splash_screen', [
            'screen' => $screen,
            'role'   => null
        ]);
    }

    public function splash($role = null)
    {
        return view('news.backend.pages.news_splash_screen', [
            'screen' => 'login',
            'role'   => $role
        ]);
    }

     public function logout()
    {

        Auth::logout();
        Session::flush();

        return redirect()->route('news.backend.pages.News_Splash_Screen', ['role' => 'login']);
    }



}
