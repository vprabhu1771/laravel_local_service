<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'service_provider_id',
        'availability_status',
    ];

    // Define relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function serviceProvider()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }

    // Filter services by service provider role
    public function scopeByServiceProviderRole($query, $roleName)
    {
        return $query->whereHas('serviceProvider', function ($query) use ($roleName) {
            $query->whereHas('roles', function ($query) use ($roleName) {
                $query->where('name', $roleName);
            });
        });
    }
}
