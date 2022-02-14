<?php declare(strict_types=1);

namespace App\Observers;

trait ObserveChanges
{
    public static function bootObserveChanges()
    {
        static::observe(new ModelChangeObserver());
    }
}
