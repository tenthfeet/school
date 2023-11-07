<?php

namespace App\Enums;

use App\Enums\Attributes\Label;
use App\Enums\Traits\CanAccessLabel;

enum PartialPayment: int
{
    use CanAccessLabel;

    #[Label('Yes')]
    case Active = 1;
    #[Label('No')]
    case Inactive = 0;

}
