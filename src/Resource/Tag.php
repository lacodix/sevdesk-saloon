<?php

namespace Lacodix\SevdeskSaloon\Resource;

use Lacodix\SevdeskSaloon\Requests\Tag\CreateTag;
use Lacodix\SevdeskSaloon\Requests\Tag\DeleteTag;
use Lacodix\SevdeskSaloon\Requests\Tag\GetTagById;
use Lacodix\SevdeskSaloon\Requests\Tag\GetTagRelations;
use Lacodix\SevdeskSaloon\Requests\Tag\GetTags;
use Lacodix\SevdeskSaloon\Requests\Tag\UpdateTag;
use Lacodix\SevdeskSaloon\Resource;

class Tag extends Resource
{
    public function get(?int $id = null, ?string $name = null): array
    {
        return $this->connector->sevSend(new GetTags($id, $name));
    }

    public function create(array $data): array
    {
        return $this->connector->sevSend(new CreateTag($data));
    }

    public function getById(int $tagId): array
    {
        return $this->connector->sevSend(new GetTagById($tagId));
    }

    public function update(int $tagId, array $data): array
    {
        return $this->connector->sevSend(new UpdateTag($tagId, $data));
    }

    public function delete(int $tagId): array
    {
        return $this->connector->sevSend(new DeleteTag($tagId));
    }

    public function getRelations(): array
    {
        return $this->connector->sevSend(new GetTagRelations());
    }
}
