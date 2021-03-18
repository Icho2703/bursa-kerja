<?php

namespace App\Http\Controllers;

use Stringable;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.news.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,jpg,png,gif' : '',
            'description' => 'required',

        ]);

        $fileName = time() . '.' . $request->file('thumbnail')->extension();
        $request->file('thumbnail')->storeAs('public', $fileName);
        $professions = News::create([
            'title' => request('title'),
            'description' => request('description'),
            'slug' => Str::slug(request('title')),
            'thumbnail' => $fileName,
            // 'thumbnail' => request()->file('thumbnail')->store('public/storage/image/professions'),

        ]);
        return redirect('admin/news/index')->with('success', 'Berita telah di unggah');
        dd($professions);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, News $news)
    {
        request()->validate([
            'title' => 'required',
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,jpg,png,gif' : '',
            'description' => 'required',

        ]);

        $news = News::findOrFail($id);

        // $fileName = time() . '.' . $request->file('thumbnail')->extension();
        // $request->file('thumbnail')->storeAs('public', $fileName);
        if ($request->hasFile('thumbnail')) {
            Storage::delete('public/storage/' . $news->thumbnail);
            $photo = $request->file('thumbnail');
            $image_extension = $photo->extension();
            $image_name = time() . '.' . $image_extension;
            $request->file('thumbnail')->storeAs('public', $image_name);
        } else {
            $image_name = $news->thumbnail;
        }
        $news->update([
            'title' => request('title'),
            'description' => request('description'),
            'slug' => Str::slug(request('title')),
            'thumbnail' => $image_name,
            // 'thumbnail' => request()->file('thumbnail')->store('public/storage/image/professions'),

        ]);
        return redirect('admin/news/index')->with('success', 'Berita telah di unggah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
