<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentMethod extends Model
{
    use HasFactory,
        SoftDeletes;

    const NAME_CASH = [
        'id' => 0,
        'label' => 'A Vista'
    ];
    const NAME_TICKET = [
        'id' => 1,
        'label' => 'Boleto'
    ];
    const NAME_CREDITCARD = [
        'id' => 2,
        'label' => 'Cartão de Crédito'
    ];
    const NAME_DEBITCARD = [
        'id' => 3,
        'label' => 'Cartão de Débito'
    ];
    const NAME_PIX = [
        'id' => 4,
        'label' => 'Pix'
    ];

    protected $fillable = [
        'name_id',
        'pix_id'
    ];

    protected $appends = [
        'name',
    ];

    public function getNameAttribute()
    {
        $name = [];

        switch ($this->name_id) {
            case 0:
                $name = self::NAME_CASH;
                break;
            case 1:
                $name = self::NAME_TICKET;
                break;
            case 2:
                $name = self::NAME_CREDITCARD;
                break;
            case 3:
                $name = self::NAME_DEBITCARD;
                break;
            case 4:
                $name = self::NAME_PIX;
                break;
            default:
                $name = null;
                break;
        }
        return $name;
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Pix::class, 'pix_id');
    }
}
