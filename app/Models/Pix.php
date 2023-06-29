<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pix extends Model
{
    use HasFactory,
        SoftDeletes;

    const TYPE_CPFCNPJ = [
        'id' => 0,
        'label' => 'CPF/CNPJ',
        'mask' => ['###.###.###-##', '##.###.###/####-##'],
        'type' => 'text',
    ];

    const TYPE_PHONE = [
        'id' => 1,
        'label' => 'Celular',
        'mask' => '(##)#####-####',
        'type' => 'text',
    ];

    const TYPE_EMAIL = [
        'id' => 2,
        'label' => 'Email',
        'mask' => null,
        'type' => 'email',
    ];

    const TYPE_RANDOMKEY = [
        'id' => 3,
        'label' => 'Chave aleatória',
        'mask' => null,
        'type' => 'text',
    ];

    protected $fillable = [
        'name',
        'key',
        'type_id'
    ];

    protected $appends = [
        'type',
    ];

    public function getTypeAttribute()
    {
        $type = [];

        switch ($this->type_id) {
            case 0:
                $type = self::TYPE_CPFCNPJ;
                break;

            case 1:
                $type = self::TYPE_PHONE;
                break;

            case 2:
                $type = self::TYPE_EMAIL;
                break;

            case 3:
                $type = self::TYPE_RANDOMKEY;
                break;

            default:
                $type = null;
                break;
        }
        return $type;
    }
}
