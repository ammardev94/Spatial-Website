<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'overview',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'overview' => 'array',
    ];

    /**
     * Get the project's feature image.
     */
    public function feature_img()
    {
        return $this->morphOne(Image::class , 'imageable')->where('tag', 'feature_img');
    }

    /**
     * Get the project's main image.
     */
    public function main_img()
    {
        return $this->morphOne(Image::class , 'imageable')->where('tag', 'main_img');
    }

    /**
     * Get the project's gallery images.
     */
    public function gallery()
    {
        return $this->morphMany(Image::class , 'imageable')->where('tag', 'gallery');
    }
}