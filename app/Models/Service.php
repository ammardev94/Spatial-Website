<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'hero_title',
        'hero_description',
        'button_text',
        'button_link',
        'open_in_new_tab',
    ];

    /**
     * Get the service's hero image.
     */
    public function heroImage()
    {
        return $this->morphOne(Image::class , 'imageable')->where('tag', 'hero');
    }

    /**
     * Get the sections for this service.
     */
    public function sections()
    {
        return $this->hasMany(ServiceSection::class)->orderBy('order', 'asc');
    }

    /**
     * Get the sub-services for this service.
     */
    public function subServices()
    {
        return $this->hasMany(ServiceSubService::class);
    }
}