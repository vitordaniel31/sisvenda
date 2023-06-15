<?php

namespace App\Observers;

use App\Models\StockHistory;

class BaseObserver
{
    public function created($model)
    {
        $this->event($model, 'created');
    }

    public function updated($model)
    {
        $this->event($model, 'updated');
    }

    public function deleted($model)
    {
        $this->event($model, 'deleted');
    }

    private function event($model, $action)
    {
        StockHistory::create([
            'user_id' => auth()->user()?->id ?? null,
            'action' => $action,
            'table' => $model->getTable(),
            'model' => get_class($model),
            'model_id' => $model->getKey(),
            'old_data' => json_encode($model->getOriginal()),
            'new_data' => json_encode($model->getAttributes()),
        ]);
    }
}
