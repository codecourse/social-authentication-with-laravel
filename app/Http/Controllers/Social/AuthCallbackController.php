<?php

namespace App\Http\Controllers\Social;

use App\Factories\Social\CreateUserFactory;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthCallbackController extends Controller
{
    public function __invoke(string $service)
    {
        auth()->login(
            $user = app(CreateUserFactory::class)
                ->forService($service)
                ->create(Socialite::driver($service)->user())
        );

        if ($user->wasRecentlyCreated) {
            event(new Registered($user));
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
