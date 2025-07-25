<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    /**
     * Redirect the user to the OAuth Provider.
     */
    public function redirect(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     */
    public function callback(string $provider, Request $request): RedirectResponse
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName() ?: $socialUser->getNickname() ?: $socialUser->getEmail(),
                // Random password since social login doesn't need one
                'password' => Str::random(32),
            ]
        );

        Auth::login($user, remember: true);

        return redirect()->intended('/dashboard');
    }
}
