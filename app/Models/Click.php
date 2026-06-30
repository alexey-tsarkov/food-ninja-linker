<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['link_id', 'ip_address'])]
class Click extends Model
{
    public const ?string UPDATED_AT = null;

    #[\Override]
    protected static function booted(): void
    {
        static::created(static function (Click $click): void {
            Link::where('id', $click->link_id)->increment('total_clicks');
        });
    }

    /**
     * @return BelongsTo<Link, self>
     */
    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
