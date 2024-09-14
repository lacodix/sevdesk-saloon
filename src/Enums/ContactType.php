<?php

namespace Lacodix\SevdeskSaloon\Enums;

enum ContactType: int
{
    case SUPPLIER = 2;
    case CUSTOMER = 3;
    case PARTNER = 4;
    case PROSPECT_CUSTOMER = 28;
}
