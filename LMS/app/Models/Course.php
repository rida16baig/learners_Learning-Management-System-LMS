<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{

    use HasFactory;

    protected $table = 'courses';
    protected $fillable = [ 'name','image', 'price', 'title', 'description', 'highlights', 'video', 'category_id' ];



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
