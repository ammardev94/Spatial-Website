<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsightCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function insights()
    {
        return $this->hasMany(Insight::class, 'insight_category_id');
    }
}
