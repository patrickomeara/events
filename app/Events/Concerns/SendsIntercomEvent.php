<?php

namespace App\Events\Concerns;

use App\Events\Data\IntercomEventData;

interface SendsIntercomEvent
{
    public function toIntercom(): IntercomEventData;
}
