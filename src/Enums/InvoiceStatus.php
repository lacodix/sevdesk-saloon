<?php

namespace Lacodix\SevdeskSaloon\Enums;

enum InvoiceStatus: int
{
    case DRAFT = 100;
    case OPEN = 200;
    case PAID = 1000;
}
