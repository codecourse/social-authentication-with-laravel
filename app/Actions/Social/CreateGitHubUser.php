<?php

namespace App\Actions\Social;

use App\Actions\Social\Contracts\CreatesUser;
use App\Models\User;

class CreateGitHubUser implements CreatesUser
{
    public function create($user): User
    {
        return User::firstOrCreate([
            'github_id' => $user->getId(),
        ], [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
        ]);
    }
}
