<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthCallbackController extends Controller
{
    public function __invoke()
    {
        dd(Socialite::driver('twitter')->user());
    }
}
