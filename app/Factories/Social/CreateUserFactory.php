<?php

namespace App\Factories\Social;

use Exception;

class CreateUserFactory
{
    public function forService(string $service)
    {
        return match ($service) {
            'twitter' => 'x create user class',
            'github' => 'github create user class',
            default => throw new Exception('Invalid service'),
        };
    }
}
