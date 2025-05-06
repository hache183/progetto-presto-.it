<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article){
        $article->setAccepted(true);
        return redirect()
        ->back()
        ->with('message', "Hai accettato l'articolo {$article->title}");
    }
    public function reject(Article $article){
        $article->setAccepted(false);
        return redirect()
        ->back()
        ->with('message', "Hai rifiutato l'articolo {$article->title}");
    }

    public function nullable(){
        $article = Article::whereNotNull('is_accepted')->orderBy('updated_at', 'desc')->first();
        if ($article) {
            $article->setAccepted(null);
            $article->save(); 
            return redirect()
                ->back()
                ->with([
                    'article' => $article,
                    'undoMessage' => "Hai annullato l'articolo {$article->title} appena revisionato",
                ]);
        }
    
        return redirect()
            ->back()
            ->with('message', 'Nessun articolo da annullare.');
    }
    

public function becomeRevisor(){
    Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
    return redirect()->route('homepage')->with('message', 'Hai chiesto di diventare revisor');
}

public function makeRevisor(User $user){
    Artisan::call('app:make-user-revisor', ['email' => $user->email]);
    return redirect()->back();
}
}