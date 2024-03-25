<?php

namespace App\Http\Resources;

use App\Models\AutoHistory;
use App\Models\Mark;
use App\Models\MarkModel;
use App\Models\TechData;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'model' => MarkModel::find($this->model_id),
            'mark' => MarkResoure::collection($this->mark_id),
            'type' => Type::find($this->type_id),
            'tech_data' => TechData::find($this->tech_data_id),
            'auto_history' => AutoHistory::find($this->auto_history_id),
        ];
    }
}
