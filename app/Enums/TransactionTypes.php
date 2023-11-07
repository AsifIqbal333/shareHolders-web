<?php

namespace App\Enums;

enum TransactionTypes: string
{
    case Invest     = 'invest';
    case Deposit    = 'deposit';
    case Withdraw   = 'withdraw';
}
