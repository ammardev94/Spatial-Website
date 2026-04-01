<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'outlook_title',
        'outlook_description',
        'why_title',
        'why_description',
        'optimistic_title',
        'optimistic_description',
        'status',
        'publish_date',
    ];

    protected $casts = [
        'publish_date' => 'datetime',
    ];

    /**
     * Polymorphic relationship (one insight can have many images)
     */
    public function images()
    {
        return $this->morphMany(Image::class , 'imageable');
    }

    /**
     * Get feature image (assuming you store type = 'feature')
     */
    public function featureImage()
    {
        return $this->morphOne(Image::class , 'imageable')->where('tag', 'feature');
    }

    /**
     * Get the gallery images.
     */
    public function gallery()
    {
        return $this->morphMany(Image::class , 'imageable')->where('tag', 'gallery');
    }


}