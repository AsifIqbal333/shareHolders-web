<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kyc extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'father_name', 'dob', 'gender', 'issue_country', 'passport_number', 'passport_expiry', 'passport_image', 'result', 'reason'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'result' => 'boolean',
    // ];

    public function user(): BelongsTo
    {
        return $this->beloBelongsTo(User::class);
    }
}
