<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageFile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'path',
        'ref_id',
        'ref_point',
        'alt_text',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'ref_id');
    }
}
