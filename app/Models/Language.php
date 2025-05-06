<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['code'];

    public function articles(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
