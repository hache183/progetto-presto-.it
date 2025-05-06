<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Language;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'title', 'description', 'price', 'category_id', 'user_id', 'origin_id', 'language_code', 'is_accepted'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisedCount(){
        return Article::where('is_accepted', null)->count();
    }

    public static function toBeTranslatedCount()
    {
        $currentLocale = app()->getLocale();

        // Prendi tutti gli articoli originali in altre lingue
        $originals = Article::where('is_accepted', true)
            ->whereNull('origin_id')
            ->where('language_code', '!=', $currentLocale)
            ->get();

        // Filtra quelli che NON hanno già una traduzione nella lingua corrente
        $count = $originals->filter(function($article) use ($currentLocale) {
            return !$article->translations()->where('language_code', $currentLocale)->exists();
        })->count();

        return $count;
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category
        ];
    }

    public function translations()
    {
        return $this->hasMany(Article::class, 'origin_id');
    }

}
