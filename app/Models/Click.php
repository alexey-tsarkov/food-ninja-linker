<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['link_id', 'ip_address'])]
class Click extends Model
{
    /**
     * @return BelongsTo<Link, self>
     */
    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
