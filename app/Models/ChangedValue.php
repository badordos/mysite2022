<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Carbon;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @property string $id
 * @property int $model_id
 * @property string $model_name
 * @property int $user_id
 * @property int $bulk
 * @property string $key
 * @property string $old_value
 * @property string $new_value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class ChangedValue extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'changedValues';

    protected $fillable = [
        'model_id',
        'model_name',
        'user_id',
        'bulk',
        'key',
        'old_value',
        'new_value',
    ];
}
