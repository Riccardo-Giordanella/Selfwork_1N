<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $articles = Article::all();
        return view('articles', ['articles' => $articles]);
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('articles.create');
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(ArticleRequest $request)
    {
        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->back()->with('message', 'Articolo creato con successo');
    }

    /**
    * Display the specified resource.
    */
    public function show(Article $article)
    {
        return view('articles.detail', compact('article'));
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return redirect(route('articles.index'))->with('message', 'Articolo aggiornato con successo');
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'))->with('message', 'Articolo eliminato con successo');
    }
}
