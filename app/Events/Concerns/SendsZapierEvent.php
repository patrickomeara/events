<?php

namespace App\Events\Concerns;

use App\Events\Data\ZapierEventData;

interface SendsZapierEvent
{
    public function toZapier(): ZapierEventData;
}
