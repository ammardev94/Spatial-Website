<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubServiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_service_id',
        'title',
    ];

    /**
     * Get the sub-service (parent) for this item.
     */
    public function subService()
    {
        return $this->belongsTo(ServiceSubService::class , 'sub_service_id');
    }
}