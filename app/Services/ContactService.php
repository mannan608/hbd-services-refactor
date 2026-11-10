<?php

namespace App\Services;

use App\Models\ContactPoint;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class ContactService
{
    /**
     * Normalize phone number.
     *
     * 01712345678
     *      ↓
     * 8801712345678
     */
    public function normalizePhone(?string $phone): ?string
    {
        if (blank($phone)) {
            return null;
        }

        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (blank($phone)) {
            return null;
        }

        if (str_starts_with($phone, '0')) {
            return '88' . $phone;
        }

        if (str_starts_with($phone, '880')) {
            return $phone;
        }

        return $phone;
    }

    /**
     * Normalize email.
     */
    public function normalizeEmail(?string $email): ?string
    {
        if (blank($email)) {
            return null;
        }

        return mb_strtolower(trim($email));
    }

    /**
     * Validate primary phone and email.
     *
     * Primary contacts are stored in users table,
     * alternative contacts are stored in contact_points.
     */
    public function validatePrimaryContacts(
        string $phone,
        string $email
    ): void {

        /*
        |--------------------------------------------------------------------------
        | Phone
        |--------------------------------------------------------------------------
        */

        $phoneExistsInUsers = User::query()
            ->where('phone', $phone)
            ->exists();

        $phoneExistsInContacts = ContactPoint::query()
            ->where('type', 'phone')
            ->where('normalized_value', $phone)
            ->exists();

        if ($phoneExistsInUsers || $phoneExistsInContacts) {
            throw ValidationException::withMessages([
                'phone' => 'This phone number is already registered.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Email
        |--------------------------------------------------------------------------
        */

        $emailExistsInUsers = User::query()
            ->where('email', $email)
            ->exists();

        $emailExistsInContacts = ContactPoint::query()
            ->where('type', 'email')
            ->where('normalized_value', $email)
            ->exists();

        if ($emailExistsInUsers || $emailExistsInContacts) {
            throw ValidationException::withMessages([
                'email' => 'This email address is already registered.',
            ]);
        }
    }
}