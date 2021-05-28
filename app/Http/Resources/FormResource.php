<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
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
            'id'           => $this->id,
            'label'        => $this->label,
            'workspace_id' => $this->workspace_id,
            'slug'         => $this->slug,
            'questions'    => QuestionResource::collection($this->questions)
        ];
    }
}
