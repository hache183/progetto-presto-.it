<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class TranslatorController extends Controller
{

    public function index()
    {
        $currentLocale = app()->getLocale();

        $originals = Article::where('is_accepted', true)
            ->whereNull('origin_id')
            ->where('language_code', '!=', $currentLocale)
            ->orderBy('created_at', 'asc')
            ->get();

        $articles = $originals->filter(function($article) use ($currentLocale) {
            return !$article->translations()->where('language_code', $currentLocale)->exists();
        });

        return view('translator.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('translator.show', compact('article'));
    }

    public function store(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        if (app()->getLocale() === $article->language_code) {
            return redirect(route('translator.index'))->with('errorMessage', 'Non è stato possibile tradurre questo articolo!');
        } else {
            Article::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $article->price,
                'language_code' => app()->getLocale(),
                'category_id' => $article->category_id,
                'user_id' => $article->user_id,
                'origin_id' => $article->id,
                'is_accepted' => true
            ]);
        }

        return redirect(route('translator.index'))->with('message', 'Articolo tradotto correttamente');
    }

    public function redirectToOriginal(Article $article)
    {
        if (is_null($article->origin_id)) {
            return redirect()->route('article.show', ['article' => $article->id]);
        }

        return redirect()->route('article.show', ['article' => $article->origin_id]);
    }
}
