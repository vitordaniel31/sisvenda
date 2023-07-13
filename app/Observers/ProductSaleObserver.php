<?php

namespace App\Observers;

class ProductSaleObserver extends BaseObserver
{
    public function saved($model)
    {
        if ($model?->sale?->bill) {
            $this->updateOrCreateBill($model);
        }
    }

    public function deleted($model)
    {
        parent::deleted($model);

        $this->updateOrCreateBill($model);
    }

    protected function updateOrCreateBill($model)
    {
        if ($model?->sale?->bill) {
            $model->sale->bill()->updateOrCreate([
                'total' => $model?->sale?->total,
            ]);
        }
    }
}
