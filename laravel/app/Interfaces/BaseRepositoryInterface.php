<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function GetAll(array $columns = ['*'], array $relations = []): Collection;
    public function GetById(int $id, array $columns = ['*'], array $relations = [], array $appends = []): ?Model;
    public function Create(array $details, ?int $id): ?Model;
    public function Edit(int $id, array $editedDetails): bool;
    public function Delete(int $id): bool;
}
