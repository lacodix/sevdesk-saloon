<?php

namespace Lacodix\SevdeskSaloon\Contracts;

interface HasResultWrapper
{
    /**
     * Key under which the payload is wrapped in the response body.
     *
     * Most sevDesk endpoints wrap their result in an "objects" key, but some
     * (e.g. the Factory/save* endpoints) return the payload at the top level.
     * Return null to receive the full, unwrapped response body.
     */
    public function getResultWrapper(): ?string;
}
