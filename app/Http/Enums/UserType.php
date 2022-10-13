<?php

namespace App\Http\Enums;

use ArchTech\Enums\InvokableCases;

enum UserType: int
{
    use InvokableCases;

    case ADMIN = 0;
    case Student = 1;
}
