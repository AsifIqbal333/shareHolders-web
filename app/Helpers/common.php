<?php

use App\Enums\PropertyStatus;
use App\Models\Amenity;
use App\Models\Investment;
use App\Models\Property;
use App\Models\Tier;
use App\Models\User;
use Carbon\Carbon;

if (!function_exists('name_alphabetic')) {
    function name_alphabetic($name)
    {
        return array_reduce(
            explode(' ', $name),
            function ($initials, $word) {
                return sprintf('%s%s', $initials, substr($word, 0, 1));
            },
            ''
        );
    }
}

if (!function_exists('random_colour')) {
    function random_colour()
    {
        $colours = ['primary', 'success', 'secondary', 'info', 'danger', 'dark'];

        $random_keys = array_rand($colours);

        return $colours[$random_keys];
    }
}

if (!function_exists('badge_colour')) {
    function badge_colour($status)
    {
        if ($status === 'verified') {
            return 'badge-success';
        } elseif ($status === 'rejected') {
            return 'badge-danger';
        } else {
            return 'badge-primary';
        }
    }
}

if (!function_exists('property_statuses')) {
    function property_statuses()
    {
        return array_column(PropertyStatus::cases(), 'value');
    }
}

if (!function_exists('convert_name')) {
    function convert_name($value)
    {
        if (str_contains($value, '-')) {
            return ucwords(str_replace('-', ' ', $value));
        } else {
            return ucwords(str_replace('_', ' ', $value));
        }
    }
}

if (!function_exists('amenity')) {
    function amenity($id)
    {
        return Amenity::find($id);
    }
}

if (!function_exists('currency_format')) {
    function currency_format($value, $is_decimal = false)
    {
        if ($is_decimal) {
            return number_format($value, 3);
        } else {
            return str_replace('.000', '', number_format($value, 3));
        }
    }
}

if (!function_exists('monthly_rent')) {
    function monthly_rent(Property $property, $amount)
    {
        return ($property->net_yield / 100) * $amount;
    }
}

if (!function_exists('appreciation')) {
    function appreciation(Property $property, $amount)
    {
        return ($property->annual_appreciation / 100) * $amount;
    }
}

if (!function_exists('funded')) {
    function funded($invest, $price)
    {
        return ceil(($invest / $price) * 100);
    }
}

if (!function_exists('is_invested')) {
    function is_invested($property_id)
    {
        return Investment::where('property_id', $property_id)->where('user_id', auth()->id())->exists();
    }
}

if (!function_exists('initials')) {
    function initials($str)
    {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }
}

if (!function_exists('referral_code')) {
    function referral_code()
    {
        if (!auth()->user()->referral_code) {
            $is_unique = false;
            do {
                $code = strtolower(str_replace(' ', '', auth()->user()->name)) . random_int(0, 999);
                if (!User::where('referral_code', $code)->exists()) {
                    request()->user()->update([
                        'referral_code' => $code
                    ]);
                    $is_unique = true;
                }
            } while (!$is_unique);
        }

        return auth()->user()->referral_code;
    }
}

if (!function_exists('referral_link')) {
    function referral_link()
    {
        return url('/rewards?ref=' . referral_code());
    }
}

if (!function_exists('user_next_tier')) {
    function user_next_tier()
    {
        $current_tier = request()->user()->user_info->tier;
        return Tier::where('starting', '>', $current_tier->starting)->first();
    }
}

if (!function_exists('user_yearly_investment')) {
    function user_yearly_investment()
    {
        return request()->user()->investments()->whereBetween(
            'created_at',
            [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]
        )->sum('amount');
    }
}

if (!function_exists('referal_reward')) {
    function referal_reward()
    {
        return 50;
    }
}
if (!function_exists('investment_for_reward')) {
    function investment_for_reward()
    {
        return 2000;
    }
}

if (!function_exists('referal_user_reward_after_investment')) {
    function referal_user_reward_after_investment()
    {
    }
}
