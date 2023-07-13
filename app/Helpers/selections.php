<?php

namespace App\Helpers;

use App\Models\Pix;
use App\Models\PaymentMethod;

function selectionPixTypes()
{
    return [
        Pix::TYPE_CPFCNPJ,
        Pix::TYPE_PHONE,
        Pix::TYPE_EMAIL,
        Pix::TYPE_RANDOMKEY,
    ];
};

function selectionPaymentMethodsNames()
{
    return [
        PaymentMethod::NAME_CASH,
        PaymentMethod::NAME_TICKET,
        PaymentMethod::NAME_CREDITCARD,
        PaymentMethod::NAME_DEBITCARD,
        PaymentMethod::NAME_PIX,
    ];
};

function selectionReportsTypes()
{
    return [
        [
            'id' => 'One',
            'label' => 'Relatório de Produtos'
        ],
        [
            'id' => 'Two',
            'label' => 'Relatório de Vendas'
        ],
        [
            'id' => 'Three',
            'label' => 'Relatório de Formas de Pagamento'
        ]
    ];
};
