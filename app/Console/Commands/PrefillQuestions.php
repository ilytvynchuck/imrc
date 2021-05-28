<?php

namespace App\Console\Commands;

use App\Repositories\QuestionRepository;
use Illuminate\Console\Command;

class PrefillQuestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prefill:questions {form_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prefill form with default list of questions';

    /**
     * @var QuestionRepository
     */
    protected $repository;

    /**
     * @var array[]
     */
    protected $questions = [
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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(QuestionRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $formId = $this->argument('form_id');

        foreach ($this->questions as $question) {
            $question['form_id'] = $formId;

            $this->repository->create($question);
        }
    }
}
