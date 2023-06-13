<?php

namespace App\Helpers;

use App\Models\Pix;

function selectionPixTypes()
{
    return [
        Pix::TYPE_CPFCNPJ,
        Pix::TYPE_PHONE,
        Pix::TYPE_EMAIL,
        Pix::TYPE_RANDOMKEY,
    ];
}
