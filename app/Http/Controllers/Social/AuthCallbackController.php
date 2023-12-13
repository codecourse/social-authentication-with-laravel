<?php

namespace App\Http\Controllers\Social;

use App\Factories\Social\CreateUserFactory;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthCallbackController extends Controller
{
    public function __invoke(string $service)
    {
        $user = Socialite::driver($service)->user();

        auth()->login(
            app(CreateUserFactory::class)
                ->forService($service)
                ->create($user)
        );

        return redirect(RouteServiceProvider::HOME);
    }
}
