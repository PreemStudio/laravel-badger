<?php

declare(strict_types=1);

namespace BaseCodeOy\Badger\Concerns;

use Illuminate\Support\Arr;

trait HasText
{
    // For now we don't sanitize the text, but we might want to in the future.
    public static function sanitizeText(string $value): string
    {
        return $value;
        // return htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8');
    }

    public function createAccessibleText(?string $label, string $message): string
    {
        if (\is_string($label)) {
            return "{$label}: {$message}";
        }

        return $message;
    }

    public function calculateTextWidth(string $text): int
    {
        $charWidthTable = \json_decode(\file_get_contents(__DIR__.'/../../resources/widths-verdana-110.json'), true, \JSON_THROW_ON_ERROR);
        $fallbackWidth = $charWidthTable[64];

        $total = 0;
        $charWidth = 0;
        $textLength = \mb_strlen($text);

        while ($textLength--) {
            $charWidth = Arr::get($charWidthTable, $this->charCodeAt($text, $textLength));
            $total += null === $charWidth ? $fallbackWidth : $charWidth;
        }

        return $total;
    }

    private function charCodeAt(string $string, int $offset): int
    {
        return \unpack('S', \mb_convert_encoding(\mb_substr($string, $offset, 1), 'UTF-16LE'))[1];
    }
}
