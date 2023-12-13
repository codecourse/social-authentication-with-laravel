<?php

namespace App\Factories\Social;

use App\Actions\Social\CreateGitHubUser;
use App\Actions\Social\CreateXUser;
use Exception;

class CreateUserFactory
{
    public function forService(string $service)
    {
        return match ($service) {
            'twitter' => new CreateXUser(),
            'github' => new CreateGitHubUser(),
            default => throw new Exception('Invalid service'),
        };
    }
}
