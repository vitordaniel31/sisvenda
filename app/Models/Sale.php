<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory,
        SoftDeletes;

    const STATUS_OPEN = [
        'id' => 0,
        'label' => 'Aberta'
    ];

    const STATUS_FINISHED = [
        'id' => 1,
        'label' => 'Finalizada'
    ];

    const STATUS_CANCELED = [
        'id' => 0,
        'label' => 'Cancelada'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client',
        'status_id',
        'user_id',
    ];

    protected $appends = [
        'status',
    ];

    public function getStatusAttribute()
    {
        $status = [];

        switch ($this->status_id) {
            case 0:
                $status = self::STATUS_OPEN;
                break;

            case 1:
                $status = self::STATUS_FINISHED;
                break;

            case 2:
                $status = self::STATUS_CANCELED;
                break;

            default:
                $status = null;
                break;
        }

        return $status;
    }

    /**
     * Get the user that owns the Sale
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the products for the Sale
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(ProductSale::class);
    }
}
