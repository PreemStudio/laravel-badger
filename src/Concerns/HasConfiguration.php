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

    public function with(string $key, mixed $value): static
    {
        $this->$key = $value;

        return $this;
    }

    public function withLabel(string $label): static
    {
        return $this->with('label', $label);
    }

    public function withLabelColor(string $labelColor): static
    {
        return $this->with('labelColor', $labelColor);
    }

    public function withStatus(string $status): static
    {
        return $this->with('status', $status);
    }

    public function withStatusColor(string $statusColor): static
    {
        return $this->with('statusColor', $statusColor);
    }

    public function withStyle(string $style): static
    {
        return $this->with('style', $style);
    }

    public function withIcon(?string $icon): static
    {
        return $this->with('icon', $icon);
    }

    public function withIconWidth(int $iconWidth): static
    {
        return $this->with('iconWidth', $iconWidth);
    }

    public function withScale(int $scale): static
    {
        return $this->with('scale', $scale);
    }
}
