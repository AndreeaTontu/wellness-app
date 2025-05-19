<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, a Laravel built in trait for easy unit and integration testing.
    use HasFactory, Notifiable;

    // Defining the relationship one-to many between this model and healthCondition.
    public function healthConditions(): HasMany
    {
        // This returns hasMany relationship, one admin can create many health problems records.
        return $this->hasMany(HealthCondition::class);
    }

    // Defining the relationship one-to-many between this model and history model.
    public function histories()
    {
        // Returns hasMany relationship, a user can have many history records.
        return $this->hasMany(History::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
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
}
