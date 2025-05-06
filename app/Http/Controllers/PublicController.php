<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('index', compact('articles'));
    }

    public function searchArticles(Request $request) {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(10);
        return view('articles.searched', ['articles' => $articles, 'query' => $query]);
    }
    public function setLanguage($lang) {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
