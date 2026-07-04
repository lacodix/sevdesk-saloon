<?php

namespace Lacodix\SevdeskSaloon\Contracts;

interface HasResultWrapper
{
    /**
     * Key under which the payload is wrapped in the response body.
     *
     * The live sevDesk API wraps virtually all responses in an "objects" key -
     * including the Factory/save* endpoints, contrary to the official OpenAPI
     * spec. Only implement this with null for endpoints whose unwrapped
     * response is verified against the live API (e.g. BookkeepingSystemVersion);
     * a wrongly assumed null wrapper broke invoice mailing in production once.
     * Return null to receive the full, unwrapped response body.
     */
    public function getResultWrapper(): ?string;
}
