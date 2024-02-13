<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

interface CRUDInterface
{
    /**
//     * @return JsonResource
     */
    public function getAll();

    /**
     * @param array $data
     * @return JsonResource
     */
    public function store(array $data): JsonResource;

    /**
     * @param array $data
     * @param $book
     * @return JsonResource
     */
    public function update(array $data, $book): JsonResource;

    /**
     * @param $book
     * @return void
     */
    public function delete($book): void;
}
