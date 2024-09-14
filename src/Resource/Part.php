<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Part\CreatePart;
use Lacodix\SevdeskSaloon\Requests\Part\GetPartById;
use Lacodix\SevdeskSaloon\Requests\Part\GetParts;
use Lacodix\SevdeskSaloon\Requests\Part\PartGetStock;
use Lacodix\SevdeskSaloon\Requests\Part\UpdatePart;
use Lacodix\SevdeskSaloon\Resource;

class Part extends Resource
{
    public function get(?string $partNumber, ?string $name): array
    {
        return $this->connector->sevSend(new GetParts($partNumber, $name));
    }

    public function create(array $data): array
    {
        return $this->connector->sevSend(new CreatePart($data));
    }

    public function getById(int $partId): array
    {
        return $this->connector->sevSend(new GetPartById($partId));
    }

    public function update(int $partId, array $data): array
    {
        return $this->connector->sevSend(new UpdatePart($partId, $data));
    }

    public function getStock(int $partId): array
    {
        return $this->connector->sevSend(new PartGetStock($partId));
    }
}
