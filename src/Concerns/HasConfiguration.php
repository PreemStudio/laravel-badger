<?php

declare(strict_types=1);

namespace PreemStudio\Badger\Concerns;

trait HasConfiguration
{
    private ?string $label = null;

    private ?string $labelColor = 'slate.900';

    private ?string $status = null;

    private ?string $statusColor = 'green.600';

    private ?string $style = 'flat';

    private ?string $icon = null;

    private int $iconWidth = 13;

    private int $scale = 1;

    public function with(string $key, mixed $value): self
    {
        $this->$key = $value;

        return $this;
    }

    public function withLabel(string $label): self
    {
        return $this->with('label', $label);
    }

    public function withLabelColor(string $labelColor): self
    {
        return $this->with('labelColor', $labelColor);
    }

    public function withStatus(string $status): self
    {
        return $this->with('status', $status);
    }

    public function withStatusColor(string $statusColor): self
    {
        return $this->with('statusColor', $statusColor);
    }

    public function withStyle(string $style): self
    {
        return $this->with('style', $style);
    }

    public function withIcon(?string $icon): self
    {
        return $this->with('icon', $icon);
    }

    public function withIconWidth(int $iconWidth): self
    {
        return $this->with('iconWidth', $iconWidth);
    }

    public function withScale(int $scale): self
    {
        return $this->with('scale', $scale);
    }
}
