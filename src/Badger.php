<?php

declare(strict_types=1);

namespace BombenProdukt\Badger;

use BombenProdukt\Badger\Concerns\HasConfiguration;
use BombenProdukt\Badger\Concerns\HasText;
use BombenProdukt\Badger\Concerns\HasView;

final class Badger
{
    use HasConfiguration;
    use HasText;
    use HasView;

    public static function make(): self
    {
        return new self();
    }

    public static function from(array $config): self
    {
        $instance = new self();

        foreach ($config as $key => $value) {
            $instance->with($key, $value);
        }

        return $instance;
    }
}
