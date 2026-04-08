<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoiRequest extends Model
{
    use HasFactory;

    protected $table = 'roi_requests';

    protected $fillable = [
        'full_name',
        'email',
        'purchase_price',
        'renovation_budget',
        'target_sale_price',
        'timeline',
    ];
}