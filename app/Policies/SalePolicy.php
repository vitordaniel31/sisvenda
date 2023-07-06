<?php

namespace App\Policies;

use App\Models\Sale;
use App\Models\User;

class SalePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('sales.read');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->can('sales.read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('sales.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->can('sales.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->can('sales.delete');
    }

    /**
     * Determine whether the user can cancel the model.
     */
    public function cancel(User $user, Sale $sale): bool
    {
        return $user->can('sales.update') && $sale->status_id != Sale::STATUS_CANCELED['id'];
    }

    /**
     * Determine whether the user can add a product the model.
     */
    public function saveProduct(User $user, Sale $sale): bool
    {
        return $user->can('sales.update') && $sale->status_id === Sale::STATUS_OPEN['id'];
    }
}
