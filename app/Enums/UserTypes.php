<?php

namespace App\Enums;

enum UserTypes: int
{
    case ADMIN = 1;
    case REGISTERED_USER = 2;
}
