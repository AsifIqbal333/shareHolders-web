<?php

namespace App\Services;

/**
 * Class TierService
 * @package App\Services
 */
class TierService
{
    public function get_tiers(): array
    {
        $tiers = [
            [
                'id' => 1,
                'name' => 'Share Info',
                'start' => 5000,
                'specifications' => [
                    'Option 1', 'Option 2', 'Option 3'
                ]
            ],
            [
                'id' => 2,
                'name' => 'Share Plus',
                'start' => 25000,
                'specifications' => [
                    'Option 1', 'Option 2', 'Option 3', 'Option 4', 'Option 5', 'Option 6'
                ]
            ],
        ];
        return $tiers;
    }
}
