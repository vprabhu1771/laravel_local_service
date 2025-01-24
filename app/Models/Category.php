<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_path',
        'name'
    ];

    /**
     * Get the full URL path for the icon.
     *
     * @param string $iconPath
     * @return string
     */
    public static function getIconFullPath($iconPath)
    {
        // Assuming your images are stored in the public directory
        
        // $basePath = config('app.url') . '/storage/';

        // $basePath = env('APP_URL') . '/storage/';        

        // return $basePath . $iconPath;

        // OR

        return env('DOMAIN_URL') . Storage::url($iconPath);
    }

    // Define relationship with services
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
