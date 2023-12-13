<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthCallbackController extends Controller
{
    public function __invoke()
    {
        $user = Socialite::driver('twitter')->user();

        auth()->login(
            User::firstOrCreate([
                'x_id' => $user->getId(),
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
            ])
        );

        return redirect(RouteServiceProvider::HOME);
    }
}
