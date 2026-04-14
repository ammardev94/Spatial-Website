<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialNFinish extends Model
{
    use HasFactory;

    protected $table = 'material_n_finishes';

    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Get the material's feature image.
     */
    public function feature_img()
    {
        return $this->morphOne(Image::class , 'imageable')->where('tag', 'feature');
    }

    /**
     * Get the material's gallery images.
     */
    public function gallery()
    {
        return $this->morphMany(Image::class , 'imageable')->where('tag', 'gallery');
    }
}