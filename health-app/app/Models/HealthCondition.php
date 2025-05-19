<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HealthCondition extends Model
{
    // We must specify which are the allowd mass-assigned columns using Laravel's built in security feature.
    protected $fillable = ['name', 'description', 'user_id'];

    /**
     * Defining one-to-many relationship between healthCondition model and user model.
     * Each health condition belongs to one user (one admin creates many health problems)
     */
    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class);
    }

    /**
     * Defining one-to-one relationship between healthcondition modeland recommendation model.
     * One health condition can have one recommendation
     */
    public function recommendation()
    {

        return $this->hasOne(Recommendation::class);
    }

    /**
     * Defining one-to-one relationship between healthCondition model and history model.
     * Each health condition has multiple search histories.
     */
    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
