<?php

namespace App\Enums;

use App\Enums\Attributes\Label;
use App\Enums\Traits\CanAccessLabel;

enum AttendanceGroup: int
{
    use CanAccessLabel;

    #[Label('Present')]
    case Present = 1;
    #[Label('Absent')]
    case Absent = 2;
    #[Label('Leave')]
    case Leave = 3;

}
