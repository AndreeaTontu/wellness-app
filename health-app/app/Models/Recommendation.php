<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    // We must specify which are the allowd mass-assigned columns using Laravel's built in security feature.
    protected $fillable = ['health_condition_id', 'diet', 'holistic_activities', 'natural_remedies'];

    // Defining ono-to-one relationship between this model and the healthCondition model.
    public function healthCondition()
    {
        /**
         * This returns belongsTo relationship,
         * meaning each recommendation belongs to one health problem record.
         */
        return $this->belongsTo(HealthCondition::class);
    }
}
