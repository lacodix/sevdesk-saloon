<?php

namespace Lacodix\SevdeskSaloon\Requests\ContactField;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * getPlaceholder
 *
 * Retrieve all Placeholders
 */
class GetPlaceholder extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string $objectName Model name
     * @param string|null $subObjectName Sub model name, required if you have "Email" at objectName
     */
    public function __construct(
        protected string $objectName,
        protected ?string $subObjectName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Textparser/fetchDictionaryEntriesByType';
    }

    public function defaultQuery(): array
    {
        return array_filter(['objectName' => $this->objectName, 'subObjectName' => $this->subObjectName]);
    }
}
