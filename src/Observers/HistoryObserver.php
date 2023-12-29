<?php

namespace LeoRalph\ModelHistory\Observers;

use Illuminate\Database\Eloquent\Model;

class HistoryObserver
{
    public function created(Model $model)
    {
        $model->histories()->create([
            'historiable_type' => $model->getMorphClass(),
            'historiable_id' => $model->getKey(),
            'event' => 'created',
            'previous' => null,
            'changes' => $model->withoutRelations()->toArray(),
        ]);
    }

    public function updated(Model $model)
    {
        $changes = $model->getChanges();

        $model->histories()->create([
            'historiable_type' => $model->getMorphClass(),
            'historiable_id' => $model->getKey(),
            'event' => 'updated',
            'previous' => array_intersect_key($model->getOriginal(), $changes),
            'changes' => $changes,
        ]);
    }

    public function deleted(Model $model)
    {
        $model->histories()->create([
            'historiable_type' => $model->getMorphClass(),
            'historiable_id' => $model->getKey(),
            'event' => 'deleted',
            'previous' => $model->withoutRelations()->toArray(),
            'changes' => null,
        ]);
    }

    public function restored(Model $model)
    {
        $model->histories()->create([
            'historiable_type' => $model->getMorphClass(),
            'historiable_id' => $model->getKey(),
            'event' => 'restored',
            'previous' => $model->withoutRelations()->toArray(),
            'changes' => null,
        ]);
    }

    public function forceDeleted(Model $model)
    {
        $model->histories()->create([
            'historiable_type' => $model->getMorphClass(),
            'historiable_id' => $model->getKey(),
            'event' => 'forceDeleted',
            'previous' => $model->withoutRelations()->toArray(),
            'changes' => null,
        ]);
    }
}