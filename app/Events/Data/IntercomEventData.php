<?php

namespace App\Events\Data;

use App\Models\User;
use Carbon\CarbonImmutable;

class IntercomEventData
{
    public function __construct(
        readonly public User $user,
        readonly public string $eventName,
        readonly public array $meta,
        readonly public CarbonImmutable $created_at,
    ) {
    }
}
