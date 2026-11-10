<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Services\ContactService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check() && Auth::user()->isActive() && Auth::user()->rolePrefix()) {
            return redirect()->route('role.dashboard', ['role' => Auth::user()->rolePrefix()]);
        }

        return view('backend.pages.auth.signin', [
            'title' => 'Login',
        ]);
    }

    // public function login(Request $request): RedirectResponse
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required', 'string'],
    //         'remember' => ['nullable', 'boolean'],
    //     ]);

    //     $remember = (bool) ($credentials['remember'] ?? false);
    //     unset($credentials['remember']);

    //     if (! Auth::attempt($credentials, $remember)) {
    //         throw ValidationException::withMessages([
    //             'email' => __('auth.failed'),
    //         ]);
    //     }

    //     $request->session()->regenerate();

    //     if (! $request->user()->isActive() || ! $request->user()->rolePrefix()) {
    //         Auth::logout();

    //         $request->session()->invalidate();
    //         $request->session()->regenerateToken();

    //         throw ValidationException::withMessages([
    //             'email' => 'Your account is not ready for access. Please contact support.',
    //         ]);
    //     }

    //     return redirect()->route('role.dashboard', [
    //         'role' => $request->user()->rolePrefix(),
    //     ]);
    // }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $remember = (bool) ($credentials['remember'] ?? false);
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        $user = $request->user();

        if (!$user->isActive() || !$user->rolePrefix()) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw ValidationException::withMessages([
                'email' => 'Your account is not ready for access.',
            ]);
        }

        if ($user->rolePrefix() === 'student') {
            return redirect()->route('student.dashboard');
        }

        return redirect()->route('role.dashboard', [
            'role' => $user->rolePrefix(),
        ]);
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

      public function showRegister()
    {
        return view('backend.pages.auth.signup');
    }
//    public function register(Request $request)
// {
//     $validatedData = $request->validate([
//          'first_name' => 'required|string|max:100',
//         'last_name'  => 'required|string|max:100',
//         'email' => 'required|email|unique:users,email',
//         'phone' => 'required|string|max:255',
//         'password' => 'required|string|min:8|confirmed',
//     ]);
//     $fullName = trim(
//         $validatedData['first_name'] . ' ' . $validatedData['last_name']
//     );

//     $user = User::create([
//         'name' => $fullName,
//         'email' => $validatedData['email'],
//         'phone' => $validatedData['phone'],
//         'password' => Hash::make($validatedData['password']),
//         'status' => 'active',
//         'primary_role_id' => 4, 
//     ]);

//     Student::create([
//         'user_id' => $user->id,
//         'student_number' => 'STU-' . str_pad($user->id, 6, '0', STR_PAD_LEFT),
//          'first_name' => $validatedData['first_name'],
//         'last_name' => $validatedData['last_name'],
//     ]);

//     return redirect()
//         ->route('login')
//         ->with('message', 'Registration successful.');
// }
public function register(
    Request $request,
    ContactService $contactService
) {
    $validatedData = $request->validate([
        'first_name' => [
            'required',
            'string',
            'max:100',
        ],

        'last_name' => [
            'required',
            'string',
            'max:100',
        ],

        'email' => [
            'required',
            'email',
            'max:255',
        ],

        'phone' => [
            'required',
            'string',
            'max:50',
        ],

        'password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
        ],
    ]);

    /*Normalize primary contacts */

    $phone = $contactService->normalizePhone(
        $validatedData['phone']
    );

    $email = $contactService->normalizeEmail(
        $validatedData['email']
    );

    /*Check phone/email uniqueness everywhere */

    $contactService->validatePrimaryContacts(
        phone: $phone,
        email: $email,
    );

    /*Create user + student */

    DB::transaction(function () use (
        $validatedData,
        $phone,
        $email,
    ) {
        $fullName = trim(
            $validatedData['first_name'] . ' ' .
            $validatedData['last_name']
        );

        /*User */

        $user = User::create([
            'name' => $fullName,

            // Primary contacts
            'email' => $email,
            'phone' => $phone,

            'password' => Hash::make(
                $validatedData['password']
            ),

            'status' => 'active',

            'primary_role_id' => 4,
        ]);

        /*Student */

        Student::create([
            'user_id' => $user->id,

            'student_number' =>
                'STU-' .
                str_pad(
                    $user->id,
                    6,
                    '0',
                    STR_PAD_LEFT
                ),

            'first_name' =>
                $validatedData['first_name'],

            'last_name' =>
                $validatedData['last_name'],
        ]);
    });

    return redirect()
        ->route('login')
        ->with(
            'message',
            'Registration successful.'
        );
}
}
