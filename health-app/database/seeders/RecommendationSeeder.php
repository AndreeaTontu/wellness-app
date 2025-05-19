<?php

namespace Database\Seeders;

use App\Models\HealthCondition;
use App\Models\Recommendation;
use Illuminate\Database\Seeder;

class RecommendationSeeder extends Seeder
{
    /**
     * Populate the database by running the database seeds.
     */
    public function run(): void
    {
        /**
         *  We get the health condition id from the database, assign it to a variable
         * and link it to a new recommendation when inserting later.
         */
        $diabetes = HealthCondition::where('name', 'Diabetes')->first();
        $bileReflux = HealthCondition::where('name', 'Bile reflux')->first();
        $hypothyroidism = HealthCondition::where('name', 'Hypothyroidism')->first();
        $irritableBowelSyndrome = HealthCondition::where('name', 'Irritable Bowel Syndrome')->first();
        $depression = HealthCondition::where('name', 'Depression')->first();
        $obesity = HealthCondition::where('name', 'Obesity')->first();
        $IronDeficiency = HealthCondition::where('name', 'Iron deficiency')->first();
        $indigestion = HealthCondition::where('name', 'Indigestion')->first();
        $foodPoisoning = HealthCondition::where('name', 'Food Poisoning')->first();
        $haemorrhoids = HealthCondition::where('name', 'Haemorrhoids')->first();

        // Create recommendations for each health condition using the variables defined earlier
        Recommendation::insert([
            [
                'health_condition_id' => $diabetes->id, // Link the existing id as foreign key to the recommendation table.
                'diet' => 'A low carb diet: brown rice, barley and oats.',
                'holistic_activities' => 'Exercise 30 minutes daily. Walking, yoga, climbing steps.',
                'natural_remedies' => 'Aloe vera juice, add cinnamon to your tea, ginger tea and 1 tbs vinegar in the morning.',
            ],
            [
                'health_condition_id' => $bileReflux->id,
                'diet' => 'A low carb diet with whole grains, such as brown rice, barley and oats.',
                'holistic_activities' => 'Yoga for a peace of mind.',
                'natural_remedies' => 'Probiotics such as yoghurt, kefir, fermented cabbage, pickles, and fennel tea.',
            ],
            [
                'health_condition_id' => $hypothyroidism->id,
                'diet' => 'Iodine-reach food: eggs, seafood, dairy products, and seaweed.',
                'holistic_activities' => 'Cardio, yoga, walk, meditation.',
                'natural_remedies' => 'Chamomile tea and natural supplements such as selenim.',
            ],
            [
                'health_condition_id' => $irritableBowelSyndrome->id,
                'diet' => 'Limit caffeined beverages, eat more fibre such as beans, barley, nuts, and seeds.',
                'holistic_activities' => 'Yoga, walk, streching, meditation.',
                'natural_remedies' => 'Ginger, calendula tea, fennel seads.',
            ],
            [
                'health_condition_id' => $depression->id,
                'diet' => 'Eat more greens, try to avoid fast food.',
                'holistic_activities' => 'Intensive workout, running, yoga, meditation.',
                'natural_remedies' => 'Chamomile tea, Vitamine D, Valerina plant',
            ],
            [
                'health_condition_id' => $obesity->id,
                'diet' => 'Low carb food.',
                'holistic_activities' => 'Jogging, swimming, walking.',
                'natural_remedies' => 'Turmeric, cardamon, green tea.',
            ],
            [
                'health_condition_id' => $IronDeficiency->id,
                'diet' => 'Spinach, kale, nuts, eggs, dried fruits.',
                'holistic_activities' => 'Sleep, regular exercise to improve red blood cells.',
                'natural_remedies' => 'Iron supplements, cumin seeds, coriander.',
            ],
            [
                'health_condition_id' => $indigestion->id,
                'diet' => 'Eat less spicy, fatty foods, cutting down coffee, and avoid alcohol.',
                'holistic_activities' => 'Abdomen massage, meditaion, prompt your head and sholder with a pillow while sleep.',
                'natural_remedies' => 'Aloe vera juice, add cinnamon to your tea, ginger tea and 1 tbs vinegar in the morning.',
            ],
            [
                'health_condition_id' => $foodPoisoning->id,
                'diet' => 'Toast, rice, boiled potatoes, plenty of water',
                'holistic_activities' => 'Sleep, meditatation',
                'natural_remedies' => 'Pepermint, ginger and chamomile tea',
            ],
            [
                'health_condition_id' => $haemorrhoids->id,
                'diet' => 'Wholegrain rice, fruits, vegetables, plenty of water, avoid caffeine',
                'holistic_activities' => 'Yoga, meditation, walking.',
                'natural_remedies' => 'Aloe vera juice, add cinnamon to your tea, ginger tea and 1 tbs vinegar in the morning.',
            ],

        ]);
    }
}
