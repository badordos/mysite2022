<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\ChangedValue;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UsersRepo extends BaseRepo
{
    protected function getModelClass(): string
    {
        return User::class;
    }

}
