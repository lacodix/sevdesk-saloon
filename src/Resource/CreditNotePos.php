<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\CreditNotePos\GetcreditNotePositions;
use Lacodix\SevdeskSaloon\Resource;
use Saloon\Http\Response;

class CreditNotePos extends Resource
{
    /**
     * @param int $creditNoteid Retrieve all creditNote positions belonging to this creditNote. Must be provided with creditNote[objectName]
     * @param string $creditNoteobjectName Only required if creditNote[id] was provided. 'creditNote' should be used as value.
     */
    public function getcreditNotePositions(?int $creditNoteid, ?string $creditNoteobjectName): Response
    {
        return $this->connector->send(new GetcreditNotePositions($creditNoteid, $creditNoteobjectName));
    }
}
