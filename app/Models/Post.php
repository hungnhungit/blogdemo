<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
class Post extends Model
{
    protected $fillable = [
        'author_id',
        'title',
        'content',
        'posted_at',
        'image',
        'slug',
        'category_id'
    ];

    protected $dates = [
        'posted_at'
    ];

    public function scopeSearch(Builder $query , ?string $search){
        if ($search) {
            return $query->where('title', 'LIKE', "%{$search}%");
        }
    }

    public function scopeQueryBuilderPost(Builder $query){
        return $query->with(['author','category'])
                     ->withCount('comments','tags')
                     ->latest()
                     ->paginate(9);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsAuthor(){
        return $this->comments()->with('author');
    }

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
