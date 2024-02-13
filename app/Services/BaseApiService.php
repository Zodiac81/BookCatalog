<?php

namespace App\Services;

use App\Contracts\RepositoryInterface;

class BaseApiService
{
    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(protected RepositoryInterface $repository)
    {

    }

    /**
     * @return mixed
     */
    public function getAll(): mixed
    {
       return $this->repository->all();
    }
}
