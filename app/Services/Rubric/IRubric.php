<?php


namespace App\Services\Rubric;

use App\Http\Resources\SingleRubricResource;

interface IRubric
{
    public function store(array $data): SingleRubricResource;
    public function update(array $data, $rubric): SingleRubricResource;
    public function delete($rubric): void;
}
