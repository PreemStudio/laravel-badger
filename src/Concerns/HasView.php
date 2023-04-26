<?php

declare(strict_types=1);

namespace BombenProdukt\Badger\Concerns;

trait HasView
{
    public function render(): string
    {
        $data = $this->toArray();

        if (empty($data['label']) && empty($data['icon'])) {
            return view("badger::{$this->style}", $data)->render();
        }

        return view("badger::{$this->style}-with-icon", $data)->render();
    }

    public function toArray(): array
    {
        $messageColor = config("badger.colors.{$this->messageColor}", $this->messageColor);
        $labelColor = config("badger.colors.{$this->labelColor}", $this->labelColor);
        $iconWidth = $this->iconWidth * 10;

        $iconSpanWidth = $this->icon ? (\mb_strlen($this->label) ? $iconWidth + 30 : $iconWidth - 18) : 0;
        $sbTextStart = $this->icon ? ($iconSpanWidth + 50) : 50;
        $sbTextWidth = $this->label ? $this->calculateTextWidth($this->label) : 0;
        $stTextWidth = $this->calculateTextWidth($this->message);
        $sbRectWidth = $sbTextWidth + 100 + $iconSpanWidth;
        $stRectWidth = $stTextWidth + 100;
        $width = $sbRectWidth + $stRectWidth;
        $xlink = $this->icon ? ' xmlns:xlink="http://www.w3.org/1999/xlink"' : '';

        $label = $this->label ? $this->sanitizeText($this->label) : '';
        $message = $this->sanitizeText($this->message);
        $messageColor = $this->sanitizeText($messageColor);
        $labelColor = $this->sanitizeText($labelColor);
        $icon = $this->icon ? $this->sanitizeText($this->icon) : $this->icon;
        $accessibleText = $this->createAccessibleText($label, $message);

        return [
            'accessibleText' => $accessibleText,
            'icon' => $icon,
            'iconSpanWidth' => $iconSpanWidth,
            'iconWidth' => $iconWidth,
            'label' => $label,
            'labelColor' => $labelColor,
            'sbRectWidth' => $sbRectWidth,
            'sbTextStart' => $sbTextStart,
            'sbTextWidth' => $sbTextWidth,
            'scale' => $this->scale,
            'message' => $message,
            'messageColor' => $messageColor,
            'stRectWidth' => $stRectWidth,
            'stTextWidth' => $stTextWidth,
            'width' => $width,
            'xlink' => $xlink,
        ];
    }
}
