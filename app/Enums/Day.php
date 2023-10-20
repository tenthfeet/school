<?php

namespace App\Enums;

use App\Enums\Attributes\Label;
use App\Enums\Traits\CanAccessLabel;

enum Day: int
{
    use CanAccessLabel;

    #[Label('Monday')]
    case Monday = 1;
    #[Label('Tuesday')]
    case Tuesday = 2;
    #[Label('Wednesday')]
    case Wednesday = 3;
    #[Label('Thursday')]
    case Thursday = 4;
    #[Label('Friday')]
    case Friday = 5;

}