<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\ChangedValue;
use Illuminate\Database\Eloquent\Collection;

class ChangedValueRepo extends BaseRepo
{
    protected function getModelClass(): string
    {
        return ChangedValue::class;
    }

    public function getByOrderModelIdAndName(int $id, string $modelName): Collection
    {
        return $this->startConditions()->where('model_id', $id)->where('model_name', $modelName)->get();
    }

    public function getBulkByModelIdAndName(int $id, string $modelName)
    {
        return $this->startConditions()->where('model_id', $id)->where('model_name', $modelName)->max('bulk');
    }
}
