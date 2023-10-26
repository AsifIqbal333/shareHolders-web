<?php

namespace App\Traits;

use App\Notifications\VerifyPhoneNotification;
use Illuminate\Support\Str;

trait MustVerifyPhone
{

    /**
     * Determine if the user has verified their phone.
     *
     * @return bool
     */
    public function hasVerifiedPhone()
    {
        return !is_null($this->phone_verified_at);
    }

    /**
     * Mark the given user's phone as verified.
     *
     * @return bool
     */
    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendPhoneVerificationNotification($otp)
    {
        $this->notify(new VerifyPhoneNotification($otp));
    }

    /**
     * Get the phone that should be used for verification.
     *
     * @return string
     */
    public function getPhoneForVerification()
    {
        return $this->phone;
    }
}
