<?php

namespace Lacodix\SevdeskSaloon\Traits;

use Exception;

trait HasPositions
{
    static private function getPositions(
        array $items,
        array $config,
        string $objectName
    ): array {
        $positions = [];

        foreach ($items as $item) {
            if (! array_key_exists('name', $item) || ! array_key_exists('price', $item)) {
                continue;
            }

            $positions[] = [
                'objectName' => ucfirst($objectName) . 'Pos',
                'mapAll'     => 'true',
                'part' => empty($item['partId']) ? null : [
                    'id'         => $item['partId'],
                    'objectName' => 'Part'
                ],
                'quantity'   => $item['quantity'] ?? 1,
                'price'      => $item['price'],
                'priceTax'   => $item['priceTax'] ?? null,
                'priceGross' => $item['priceGross'] ?? null,
                'name'       => $item['name'],
                'unity'      => [
                    'id'         => $item['unityId'] ?? 1,
                    'objectName' => 'Unity',
                ],
                'text'       => $item['text'] ?? '',
                'discount'   => $item['discount'] ?? null,
                'optional'   => $item['optional'] ?? null,
                'taxRate'    => $item['taxRate'] ?? $config['taxRate'],
                ... array_key_exists('positionNumber', $item) ? ['positionNumber' => $item['positionNumber']] : [],
            ];
        }

        return $positions;
    }
}
