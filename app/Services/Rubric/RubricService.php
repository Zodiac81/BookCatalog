<?php


namespace App\Services\Rubric;

use App\Http\Resources\SingleRubricResource;
use App\Models\Rubric;

class RubricService implements IRubric
{
    public function store(array $data): SingleRubricResource
    {
        $rubric = Rubric::create($data);
        return new SingleRubricResource($rubric);
    }

    public function update(array $data, $rubric): SingleRubricResource
    {
        if($rubric->update($data)) {
            return new SingleRubricResource($rubric);
        }
    }

    public function delete($rubric): void
    {
        $rubric->delete();
    }
}
