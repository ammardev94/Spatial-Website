<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageMeta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pages_meta';

    protected $fillable = [
        'ref_id',
        'ref_key',
        'ref_value',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'ref_id', 'id');
    }
}
