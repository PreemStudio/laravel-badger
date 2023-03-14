<?php

declare(strict_types=1);

namespace PreemStudio\Badger\Concerns;

trait HasView
{
    public function render(): string
    {
        $statusColor = config("badger.colors.$this->statusColor", $this->statusColor);
        $labelColor  = config("badger.colors.$this->labelColor", $this->labelColor);
        $iconWidth   = $this->iconWidth * 10;

        $iconSpanWidth = $this->icon ? (strlen($this->label) ? $iconWidth + 30 : $iconWidth - 18) : 0;
        $sbTextStart   = $this->icon ? ($iconSpanWidth + 50) : 50;
        $sbTextWidth   = $this->label ? $this->calculateTextWidth($this->label) : 0;
        $stTextWidth   = $this->calculateTextWidth($this->status);
        $sbRectWidth   = $sbTextWidth + 100 + $iconSpanWidth;
        $stRectWidth   = $stTextWidth + 100;
        $width         = $sbRectWidth + $stRectWidth;
        $xlink         = $this->icon ? ' xmlns:xlink="http://www.w3.org/1999/xlink"' : '';

        $label          = $this->label ? $this->sanitizeText($this->label) : '';
        $status         = $this->sanitizeText($this->status);
        $statusColor    = $this->sanitizeText($statusColor);
        $labelColor     = $this->sanitizeText($labelColor);
        $icon           = $this->icon ? $this->sanitizeText($this->icon) : $this->icon;
        $accessibleText = $this->createAccessibleText($label, $status);

        return view(empty($icon) ? "badger::{$this->style}" : "badger::{$this->style}-with-icon", [
            'accessibleText' => $accessibleText,
            'icon'           => $icon,
            'iconSpanWidth'  => $iconSpanWidth,
            'iconWidth'      => $iconWidth,
            'label'          => $label,
            'labelColor'     => $labelColor,
            'sbRectWidth'    => $sbRectWidth,
            'sbTextStart'    => $sbTextStart,
            'sbTextWidth'    => $sbTextWidth,
            'scale'          => $this->scale,
            'status'         => $status,
            'statusColor'    => $statusColor,
            'stRectWidth'    => $stRectWidth,
            'stTextWidth'    => $stTextWidth,
            'width'          => $width,
            'xlink'          => $xlink,
        ])->render();
    }
}
