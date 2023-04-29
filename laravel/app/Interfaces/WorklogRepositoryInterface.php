<?php
namespace App\Interfaces;

use App\Models\Worklog;
use Illuminate\Database\Eloquent\Model;

interface WorklogRepositoryInterface extends BaseRepositoryInterface
{
    public function Create(array $details, ?int $id): ?Model;
}
