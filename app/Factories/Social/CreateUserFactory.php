<?php

namespace App\Factories\Social;

use App\Actions\Social\CreateXUser;
use Exception;

class CreateUserFactory
{
    public function forService(string $service)
    {
        return match ($service) {
            'twitter' => new CreateXUser(),
            // 'github' => 'github create user class',
            default => throw new Exception('Invalid service'),
        };
    }
}
