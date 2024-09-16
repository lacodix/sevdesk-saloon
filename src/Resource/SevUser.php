<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\SevUser\GetSevUsers;
use Lacodix\SevdeskSaloon\Resource;

class SevUser extends Resource
{
    public function get(?int $id = null, ?string $name = null): array
    {
        return $this->connector->sevSend(new GetSevUsers($id, $name));
    }
}
