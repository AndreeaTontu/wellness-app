<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    // We must specify which are the allowd mass-assigned columns using Laravel's built in security feature.
    protected $fillable = ['user_id', 'health_condition_id'];

    // Defining many-to-one relationship between this model and User model.
    public function user()
    {
        // This returns belongsTo relationship, multiple history records can belong to one user.
        return $this->belongsTo(User::class);
    }

    // Defining many-to-one relationship between this model and healthCondition model.
    public function healthCondition()
    {
        // This returns belongsTo relationship, many history records can belong to one health condition.
        return $this->belongsTo(HealthCondition::class);
    }
}
