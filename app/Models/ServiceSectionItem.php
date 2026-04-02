<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'title',
        'description',
        'video_url',
        'order',
    ];

    /**
     * Get the item image.
     */
    public function image()
    {
        return $this->morphOne(Image::class , 'imageable')->where('tag', 'item');
    }

    /**
     * Get the section that owns the item.
     */
    public function section()
    {
        return $this->belongsTo(ServiceSection::class , 'section_id');
    }
}