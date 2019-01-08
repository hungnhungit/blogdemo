<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
	protected $fillable = ['slug', 'name'];
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function countPost(): Int{
        return $this->posts()->count();
    }

    public function parentId(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }
}
