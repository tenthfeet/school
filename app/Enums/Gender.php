<?php

namespace App\Enums;

use App\Enums\Attributes\Label;
use App\Enums\Traits\CanAccessLabel;

enum Gender: int
{
    use CanAccessLabel;

    #[Label('Male')]
    case Male = 1;
    #[Label('Female')]
    case Female = 2;

}
