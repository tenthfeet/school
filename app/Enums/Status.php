<?php

namespace App\Enums;

use App\Enums\Attributes\Label;
use App\Enums\Traits\CanAccessLabel;

enum Status: int
{
    use CanAccessLabel;

    #[Label('Active')]
    case Active = 1;
    #[Label('Inactive')]
    case Inactive = 0;

}
