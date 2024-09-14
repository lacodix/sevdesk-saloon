<?php

namespace Lacodix\SevdeskSaloon\Enums;

enum CreditNoteStatus: int
{
    case DRAFT = 100;
    case DELIVERED = 200;
    case PARTIAL_PAYMENT = 1000;
    case PAID = 2000;
}
