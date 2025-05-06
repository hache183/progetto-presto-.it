<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'path'
    ];

    protected function casts(): array
    {
        return [
            'labels' => 'array',
        ];
    }
    
    public static function getUrlByFilePath($filePath, $w = NULL, $h = NULL)
    {
        if (!$w && $h) {
            return Storage::url($filePath);
        }
        $path = dirname($filePath);
        $filename = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_" . $filename;
        return Storage::url($file);
    }

    public function getUrl($w = NULL, $h = NULL)
    {
        return self::getUrlByFilePath($this->path, $w, $h);
    }

    public function article() : BelongsTo 
    {
        return $this->belongsTo(Article::class);
    }
}
