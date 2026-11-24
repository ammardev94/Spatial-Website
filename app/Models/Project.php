<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'overview',
        'project_category_id',
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

    /**
     * Auto-generate slug from title when missing.
     */
    protected static function booted()
    {
        static::saving(function ($project) {
            if (empty($project->slug) && ! empty($project->title)) {
                $project->slug = Str::slug($project->title);
            }
            elseif (! empty($project->slug)) {
                $project->slug = Str::slug($project->slug);
            }
        });
    }

    /**
     * Get the project's category.
     */
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }
}