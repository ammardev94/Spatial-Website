<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pages';

    protected $fillable = [
        'type',
        'title',
        'slug',
        'page_title',
        'page_description',
        'visibility',
        'status',
        'canonical_url',
        'has_meta',
        'added_by',
    ];

    public function pageMetas(): HasMany
    {
        return $this->hasMany(PageMeta::class, 'ref_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

    public function pageFiles(): HasMany
    {
        return $this->hasMany(PageFile::class, 'ref_id');
    }

    public function seoPage()
    {
        return $this->hasOne(SeoPage::class, 'page_id');
    }


}
