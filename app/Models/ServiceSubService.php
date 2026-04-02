<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
    ];

    /**
     * Get the service that owns the sub-service.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the actual sub-service items.
     */
    public function items()
    {
        return $this->hasMany(ServiceSubServiceItem::class , 'sub_service_id');
    }
}