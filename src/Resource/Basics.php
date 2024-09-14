<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Basics\BookkeepingSystemVersion;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class Basics extends Resource
{
    public function bookkeepingSystemVersion(): array
    {
        return $this->connector->sevSend(new BookkeepingSystemVersion());
    }
}
