<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Bill extends Model
{
    use HasFactory,
        SoftDeletes,
        CascadeSoftDeletes;

    /**
     * The relationships that should be soft deleted.
     *
     * @var array
     */
    protected $cascadeDeletes = [
        'paymentMethods',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sale_id',
        'total',
    ];

    protected $appends = [
        'total',
    ];

    public function getTotalAttribute()
    {
        return $this->paymentMethods()->sum('value');
    }

    /**
     * Get the sale that owns the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    /**
     * The paymentMethods that belong to the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paymentMethods(): BelongsToMany
    {
        return $this->belongsToMany(PaymentMethod::class)->withPivot('value');
    }
}
