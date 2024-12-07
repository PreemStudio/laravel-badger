<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
