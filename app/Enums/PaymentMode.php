<?php

namespace App\Enums;

use App\Enums\Attributes\Label;
use App\Enums\Traits\CanAccessLabel;

enum PaymentMode: int
{
    use CanAccessLabel;

    #[Label('Cash')]
    case Cash = 1;
    #[Label('Online')]
    case Online = 2;
    #[Label('Cheque')]
    case Cheque = 3;
    #[Label('DD')]
    case DD = 4;

}
