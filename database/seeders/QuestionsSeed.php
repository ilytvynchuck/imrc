<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'label'      => 'First name?',
                'field_name' => 'first_name',
                'is_require' => 1,
            ],
            [
                'label'      => 'Last name?',
                'field_name' => 'last_name',
                'is_require' => 1,
            ],
            [
                'label'      => 'E-mail?',
                'field_name' => 'email',
                'is_require' => 1,
            ],
            [
                'label'      => 'Phone number?',
                'field_name' => 'phone',
                'is_require' => 1,
            ],
            [
                'label'      => 'Company?',
                'field_name' => 'company',
                'is_require' => 0,
            ],
            [
                'label'      => 'Where do you work ( office or at home )?',
                'field_name' => 'remote',
                'is_require' => 1,
            ],
            [
                'label'      => 'How has the pandemic affected your life?',
                'field_name' => 'pandemic_affect',
                'is_require' => 1,
            ],
            [
                'label'      => 'Did you manage to find a job in pandemic time?',
                'field_name' => 'manage_time',
                'is_require' => 1,
            ],
            [
                'label'      => 'Has video conferencing became a part of your working schedule?',
                'field_name' => 'conferencing',
                'is_require' => 1,
            ],
            [
                'label'      => 'How much do you work per day (in hours)?',
                'field_name' => 'hours',
                'is_require' => 1,
            ],
            [
                'label'      => 'Do you want to change your job?',
                'field_name' => 'change_job',
                'is_require' => 0,
            ],
        ];
    }
}
