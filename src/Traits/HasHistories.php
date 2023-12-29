<?php

namespace LeoRalph\ModelHistory\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use LeoRalph\ModelHistory\Models\History;
use LeoRalph\ModelHistory\Observers\HistoryObserver;

trait HasHistories
{
    public static function bootHasHistories()
    {
        static::observe(HistoryObserver::class);
    }

    public function histories(): MorphMany
    {
        return $this->morphMany(config('model-history.model'), 'historiable');
    }
}