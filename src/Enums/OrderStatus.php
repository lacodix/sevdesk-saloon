<?php

namespace Lacodix\SevdeskSaloon\Enums;

enum OrderStatus: int
{
    case DRAFT = 100;
    case DELIVERED = 200;
    case CANCELLED = 300;
    case ACCEPTED = 500;
    case PARTIAL_CALCULATED = 750;
    case CALCULATED = 1000;
}
