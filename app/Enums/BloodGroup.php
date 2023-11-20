<?php

namespace App\Enums;

use App\Enums\Attributes\Label;
use App\Enums\Traits\CanAccessLabel;

enum BloodGroup: int
{
    use CanAccessLabel;

    #[Label('O+')]
    case OPositive = 1;
    #[Label('O-')]
    case ONegative = 2;
    #[Label('A+')]
    case APositive = 3;
    #[Label('A-')]
    case ANegative = 4;
    #[Label('B+')]
    case BPositive = 5;
    #[Label('B-')]
    case BNegative = 6;
    #[Label('AB+')]
    case ABPositive = 7;
    #[Label('AB-')]
    case ABNegative = 8;
}
