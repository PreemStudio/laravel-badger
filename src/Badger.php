<?php

declare(strict_types=1);

namespace BaseCodeOy\Badger;

use BaseCodeOy\Badger\Concerns\HasConfiguration;
use BaseCodeOy\Badger\Concerns\HasText;
use BaseCodeOy\Badger\Concerns\HasView;

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
