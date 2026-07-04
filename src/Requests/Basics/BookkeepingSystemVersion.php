<?php

namespace Lacodix\SevdeskSaloon\Requests\Basics;

use Lacodix\SevdeskSaloon\Contracts\HasResultWrapper;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * bookkeepingSystemVersion
 *
 * To check if you already received the update to version 2.0 you can use this endpoint.
 */
class BookkeepingSystemVersion extends Request implements HasResultWrapper
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/Tools/bookkeepingSystemVersion';
    }

    public function getResultWrapper(): ?string
    {
        // /Tools/bookkeepingSystemVersion returns its payload at the top level
        // ({ "version": ... }) without an "objects" wrapper.
        return null;
    }
}
