<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * @var bool
     */
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'label'             => $this->label,
            'field_name'        => $this->field_name,
            'is_require'        => $this->is_require,
            'form_id'           => $this->form->id,
            'form_questions_id' => $this->formQuestions->id,
        ];
    }
}
