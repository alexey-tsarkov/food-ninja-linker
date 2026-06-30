<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

#[Fillable('user_id', 'short_code', 'original_url')]
class Link extends Model
{
    public const ?string UPDATED_AT = null;

    #[\Override]
    protected static function booted(): void
    {
        static::creating(static function (Link $link): void {
            $link->user_id = Auth::id();
            $link->short_code ??= self::generateShortCode();
        });
    }

    protected static function generateShortCode(int $size = 4): string
    {
        return \rtrim(\strtr(\base64_encode(\random_bytes($size)), '+/', '-_'), '=');
    }

    /**
     * @return BelongsTo<User, self>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany<Click, self>
     */
    public function clicks(): HasMany
    {
        return $this->hasMany(Click::class);
    }
}
