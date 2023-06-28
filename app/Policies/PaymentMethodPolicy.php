<?php

namespace App\Policies;

use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PaymentMethodPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {        
        return $user->can('paymentMethods.read');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->can('paymentMethods.read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('paymentMethods.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->can('paymentMethods.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->can('paymentMethods.delete');
    }
}
