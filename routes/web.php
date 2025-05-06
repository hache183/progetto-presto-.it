<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\TranslatorController;

Route::get('/', [PublicController::class, 'index'])->name('homepage');
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::patch('/nullable', [RevisorController::class, 'nullable'])->name('nullable');
Route::get('/revisor/request',[RevisorController::class, 'becomeRevisor'])->middleware('auth')-> name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
Route::get('/translator/index', [TranslatorController::class, 'index'])->middleware('isTranslator')->name('translator.index');
Route::get('/translator/{article}/show', [TranslatorController::class, 'show'])->middleware('isTranslator')->name('translator.show');
Route::post('/translator/{article}/store', [TranslatorController::class, 'store'])->middleware('isTranslator')->name('translator.store');
Route::get('/article/{article}/origin/show', [TranslatorController::class, 'redirectToOriginal'])->name('article.origin');