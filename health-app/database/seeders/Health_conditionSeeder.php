<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Health_conditionSeeder extends Seeder
{
    /**
     * Populate the database by running the database seeds.
     */
    public function run(): void
    {
        // Inserting the data in each column of the database table health_condition (name and description).
        DB::table('health_conditions')->insert([
            [
                // Name of the health problem.
                'name' => 'Diabetes',
                // Description of the health problem.
                'description' => 'A chronic condition that impacts the ability of the body'.
                            'to metabolise glucose, or blood sugar. If left untreated, it can lead to fatigue, '.
                            'increased thirst, and frequent urination.',
            ],
            [
                'name' => 'Bile reflux',
                'description' => 'Bile reflux happens when the liver produces bile, a digestive liquid,'.
                            'which backs up (refluxes) into stomach and,occasionally,'.
                            'into the esophagus, the tube that connects mouth and stomach.',

            ],
            [
                'name' => 'Hypothyroidism',
                'description' => 'A condition characterised by insufficient production of thyroid hormones by the thyroid gland,'.
                            'resulting in lethargy, weight gain, and a higher sensitivity to cold.',
            ],
            [
                'name' => 'Irritable Bowel Syndrome',
                'description' => 'A gastrointestinal condition characterised by abdominal cramping,'.
                            'pain, flatuance, bloating and either constipation or diarrhoea.',
            ],
            [
                'name' => 'Depression',
                'description' => 'A mood illness that interferes with day-to-day functioning,'.
                            'causing persistent feelings of melancholy and loss of interest.',
            ],
            [
                'name' => 'Obesity',
                'description' => 'A complex condition that increase the risk of diabetes,'.
                            'heart disease, and other illneses, causing excesive body fat.',
            ],
            [
                'name' => 'Iron deficiency',
                'description' => 'A condition that results in weakness and exhaustion because the body'.
                            'does not have enough healthy red blood cells to deliver enough oxygen to tissues.',
            ],
            [
                'name' => 'Indigestion',
                'description' => 'A common digestive condition that is characterised with upper'.
                            'abdominal pain or burning sensation, frequently accompanied with nausea,bloating'.
                            'or a post-meal fealing of fullness.',
            ],
            [
                'name' => 'Food poisoning',
                'description' => 'This condition results in symptoms such as nausea, vomiting, diarrhoea, abdominal pain,'.
                            'and fever, which are caused by the consumption of contaminated food or beverages.'.
                            'It is often results from parasites,viruses, toxins or bacteria in food.',
            ],
            [
                'name' => 'Haemorrhoids',
                'description' => 'Enlarged veins in the rectum that can cause pain, itching,'.
                            'bleeding or irritation. It is often associated to prolong sitting, straining'.
                            'during bowel movements, pregnancy or regularly lifting heavy objects.',
            ],
        ]);

    }
}
