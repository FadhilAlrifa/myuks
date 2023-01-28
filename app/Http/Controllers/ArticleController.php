<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\ArticleCategory;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.articles', [
            "url_name" => "Artikel",
            "nav_title" => "Artikel Kesehatan",
            "user" => User::latest()->get(),
            "icon" => "article_icon.png",
            "articles" => Article::latest()->filter(request(['search', 'category']))->get(),
            "articles_category" => ArticleCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.add', [
            "url_name" => "Artikel",
            "articles_category" => ArticleCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "url_name" => "Artikel",
            'title' => 'required|max:255',
            'category_id' => 'required',
            'highlight' => 'required',
            'image' => 'image|file|max:5120',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('articles');
        }

        $validatedData["slug"] = SlugService::createSlug(Article::class, 'slug', $request->title);
        $validatedData["view"] = 0;

        Article::create($validatedData);

        return redirect('/articles')->with('success', 'Artikel baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $view = $article->view;
        $updateView = [
            "view" => $view + 1
        ];

        Article::where('id', $article->id)->update($updateView);
        return view('article.article', [
            "url_name" => "Artikel",
            "articles" => Article::all(),
            "articles_carousel" => Article::latest()->get(),
            "article" => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            "url_name" => "Artikel",
            "article" => $article,
            "articles_category" => ArticleCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'highlight' => 'required',
            'image' => 'image:jpg,jpeg,png|file|max:5120',
            'body' => 'required'
        ]);

        if ($request->title != $article->title) {
            $validatedData["slug"] = SlugService::createSlug(Article::class, 'slug', $request->title);
        }

        if ($request->file('image')) {
            if ($article->image) {
                Storage::delete($article->image);
            }
            $validatedData['image'] = $request->file('image')->store('articles');
        }

        Article::where('id', $article->id)->update($validatedData);

        return redirect("/articles")->with('success', 'Artikel baru berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete($article->image);
        }

        Article::destroy($article->id);

        return redirect('/articles')->with('success', 'Artikel berhasil dihapus');
    }

    public function delete(Article $article)
    {
        return view('article.delete', [
            "url_name" => "Artikel",
            "article" => $article
        ]);
    }
}
