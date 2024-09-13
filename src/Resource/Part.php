<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Part\CreatePart;
use Lacodix\SevdeskSaloon\Requests\Part\GetPartById;
use Lacodix\SevdeskSaloon\Requests\Part\GetParts;
use Lacodix\SevdeskSaloon\Requests\Part\PartGetStock;
use Lacodix\SevdeskSaloon\Requests\Part\UpdatePart;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class Part extends Resource
{
    /**
     * @param string $partNumber Retrieve all parts with this part number
     * @param string $name Retrieve all parts with this name
     */
    public function getParts(?string $partNumber, ?string $name): Response
    {
        return $this->connector->send(new GetParts($partNumber, $name));
    }

    public function createPart(): Response
    {
        return $this->connector->send(new CreatePart());
    }

    /**
     * @param int $partId ID of part to return
     */
    public function getPartById(int $partId): Response
    {
        return $this->connector->send(new GetPartById($partId));
    }

    /**
     * @param int $partId ID of part to update
     */
    public function updatePart(int $partId): Response
    {
        return $this->connector->send(new UpdatePart($partId));
    }

    /**
     * @param int $partId ID of part for which you want the current stock.
     */
    public function partGetStock(int $partId): Response
    {
        return $this->connector->send(new PartGetStock($partId));
    }
}
