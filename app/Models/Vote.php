<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    public const VALUE_LIKE = 'like';
    public const VALUE_DISLIKE = 'dislike';

    protected $fillable = [
        'user_id',
        'post_id',
        'value',
    ];

    protected $casts = [
        'value' => 'string',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
