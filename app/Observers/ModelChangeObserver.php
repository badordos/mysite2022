<?php declare(strict_types=1);

namespace App\Observers;

use App\Models\ChangedValue;
use App\Repositories\ChangedValueRepo;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use JsonException;
use JsonSerializable;
use Stringable;

class ModelChangeObserver
{
    public bool $afterCommit = true;

    private ChangedValueRepo $changedValueRepository;

    public function __construct()
    {
        $this->changedValueRepository = app(ChangedValueRepo::class);
    }

    public function updated(Model $model): void
    {
        if ($model->isClean()) {
            return;
        }

        $original = $model->getOriginal();
        $changes = Arr::except($model->getChanges(), ['created_at', 'updated_at']);
        $className = get_class($model);
        $bulk = $this->changedValueRepository->getBulkByModelIdAndName($model->getKey(), $className) + 1;
        foreach ($changes as $key => $value) {
            ChangedValue::create([
                'model_id' => $model->getKey(),
                'model_name' => $className,
                'user_id' => auth()->user()->id ?? null,
                'bulk' => $bulk,
                'key' => $key,
                'old_value' =>  $this->value($original[$key]),
                'new_value' => $this->value($value),
            ]);
        }
    }

    /**
     * @throws JsonException
     */
    private function value(mixed $value): string|int|float|bool|null
    {
        if (is_int($value) || is_float($value) || is_null($value)) {
            return $value;
        }
        if ($value instanceof JsonSerializable) {
            return json_encode($value, JSON_THROW_ON_ERROR);
        }
        if ($value instanceof Arrayable) {
            return json_encode($value->toArray(), JSON_THROW_ON_ERROR);
        }
        if ($value instanceof Stringable) {
            return (string)$value;
        }
        if (is_string($value)) {
            return $value;
        }

        return json_encode($value, JSON_THROW_ON_ERROR);
    }
}
