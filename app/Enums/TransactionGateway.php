<?php

namespace App\Enums;

enum TransactionGateway: string
{
    case Stripe           = 'stripe';
    case Wallet           = 'wallet';
    case Reward           = 'reward';
    case Bank             = 'bank';
    case ReferralReward   = 'referral reward';
}
