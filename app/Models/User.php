<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;

use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image_path',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Laravel Gravatar profile Image Request
    protected $appends = ['avatar'];

    public function getAvatarAttribute() {
        return "https://gravatar.com/avatar/" . md5( strtolower( trim( $this-> email) ) );
    }

    public function getImagePath()
    {
        return env('DOMAIN_URL') . Storage::url($this->image_path);
    }

    // Define relationship with services
    // public function servicesProvided()
    // {
    //     return $this->hasMany(Service::class, 'provider_id');
    // }

    // public function customerAppointments()
    // {
    //     return $this->hasMany(Appointment::class, 'customer_id');
    // }

    // public function providerAppointments()
    // {
    //     return $this->hasMany(Appointment::class, 'provider_id');
    // }

    // public function customerReviews()
    // {
    //     return $this->hasMany(Review::class, 'customer_id');
    // }

    // public function providerReviews()
    // {
    //     return $this->hasMany(Review::class, 'provider_id');
    // }

    // public function customerTransactions()
    // {
    //     return $this->hasMany(PaymentTransaction::class, 'customer_id');
    // }

    public function providerTransactions()
    {
        return $this->hasMany(PaymentTransaction::class, 'provider_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}