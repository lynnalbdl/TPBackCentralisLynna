<?php

namespace App\Hashing;

use Illuminate\Contracts\Hashing\Hasher;

class Sha256Hasher implements Hasher
{
    public function make($value, array $options = []): string
    {
        return hash('sha256', $value);
    }

    public function check($value, $hashedValue, array $options = []): bool
    {
        return hash('sha256', $value) === $hashedValue;
    }

    public function needsRehash($hashedValue, array $options = []): bool
    {
        return false;
    }

    public function info($hashedValue): array
    {
        return [
            'algo' => 'sha256',
            'algoName' => 'sha256',
        ];
    }
}
