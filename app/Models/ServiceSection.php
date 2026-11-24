<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'type',
        'order',
    ];

    /**
     * Get the service that owns the section.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the items for this section.
     */
    public function items()
    {
        return $this->hasMany(ServiceSectionItem::class , 'section_id')->orderBy('id', 'desc');
    }

    /**
     * Get the images for this section.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Get the main image for this section.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable')->where('tag', 'main');
    }
}