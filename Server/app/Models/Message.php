<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Message extends Model
{
    use HasFactory, HasApiTokens;

    public $table = 'messages';
    protected $fillable = ['id', 'user_id', 'text'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTimeAttribute(): string
    {
        return date(
            "d M Y, H:i:s",
            strtotime($this->attributes['created_at'])
        );
    }
}
