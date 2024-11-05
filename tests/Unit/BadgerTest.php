<?php

declare(strict_types=1);

namespace Tests\Unit;

use BaseCodeOy\Badger\Badger;
use function Spatie\Snapshots\assertMatchesSnapshot;

$icon = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzNDAuOTI1IiBoZWlnaHQ9IjIwMi42NzYiIHZpZXdCb3g9IjAgMCA5MC4yMDMgNTMuNjI1Ij48ZyBmaWxsPSIjZmZmIj48cGF0aCBvcGFjaXR5PSIuNDU2IiBkPSJNNDUuMjE2IDMuODI2Yy0xMi44MzYgMC0yMi4yOCAzLjYzNC0yNi44ODQgMTAuNTMxLS4wOTEtLjEwNi0uMTcxLS4xNzItLjI2Ni0uMzAyLS40NTktLjYyOS0uOTQ1LTEuNDg2LTEuNDI4LTIuMzg0LS40ODQtLjg5OC0uOTY3LTEuODM1LTEuNDg1LTIuNjctLjUxOC0uODM1LTEuMDI1LTEuNTkzLTEuODc0LTIuMTE2LS45MjctLjU3My0xLjczMy0uODI4LTIuMzQ3LS45MTZhMy42ODMgMy42ODMgMCAwIDAtLjg2Mi0uMDE1Yy0xLjUzNS4wMDYtMi43MTQgMS4wMTgtMy42MiAyLjI1NS0uOTEgMS4yNDEtMS42MDkgMi44MzUtMi4wNDIgNC41ODYtLjg2NiAzLjQ5OS0uNzAzIDcuNzU4IDIuMDU2IDEwLjU2IDEuNDYgMS40OTMgMy40MDQgMi4zNSA1LjI2NSAyLjg1IDEuMzIuMzU1IDIuNTMuNDc4IDMuNjI5LjUwOS42MDggNy4xMzMgNC43OTcgMTMuNDA2IDEwLjM5IDE2LjU1OWguMDAxYzIuOTg1IDEuNjc3IDYuMDg0IDIuNTM4IDguNzk5IDMuNTc3IDMuNDY4IDEuMzQgNi44MzQgMi42NDMgMTAuMzY2IDIuOTUybC4wNTguMDA2aC40MDVjMy43MDUgMCA3LjA3Ni0xLjY1NiAxMC40NzgtMi45NTYgMi43MS0xLjAzNyA1LjgxMi0xLjg3NiA4LjgwMi0zLjU1NiA1LjYyMy0zLjE1MiA5LjgxLTkuNDQgMTAuNDItMTYuNTcyIDIuNjc4LS4wNTIgNi4zNTYtLjgyOCA4Ljg0MS0zLjM2NyAyLjc2MS0yLjgwMiAyLjkyNS03LjA2MiAyLjA1OC0xMC41NjItLjQzMy0xLjc1LTEuMTMxLTMuMzQ1LTIuMDQxLTQuNTg2LS45MDctMS4yMzctMi4wODYtMi4yNS0zLjYyMS0yLjI1NWEzLjY4NCAzLjY4NCAwIDAgMC0uODYyLjAxNWMtLjYxNC4wODgtMS40Mi4zNDMtMi4zNDguOTE2LS44NDQuNTItMS4zNSAxLjI3My0xLjg2NSAyLjEwMi0uNTE2LjgzLS45OTcgMS43Ni0xLjQ3OCAyLjY1NS0uNDguODk0LS45NjQgMS43NS0xLjQyIDIuMzgyLS4wOTQuMTMtLjE3NC4xOTctLjI2NC4zMDMtNC42MTEtNi44Ny0xNC4wNDUtMTAuNS0yNi44Ni0xMC41eiIvPjxwYXRoIGQ9Ik00NS4xMyAwQzM0LjE3OCAwIDI0LjkyMiAyLjU1MSAxOC44NCA3LjkyOGMtLjE4NC0uMzI3LS4zMTktLjYxLS41My0uOTQ5LS42MzYtMS4wMjUtMS4yMzEtMi4xODktMy4xMS0zLjM0Ny0xLjMzMS0uODIzLTIuNjU3LTEuMjgyLTMuODEtMS40NS0uNTc0LS4wODItMS4yNDItLjA1NS0xLjc2OC0uMDA3bC4zNzEtLjA0N2MtMy40MTcgMC01LjQyMSAyLjA1LTYuNzE4IDMuODE4QzEuOTggNy43MTUgMS4xNDUgOS43LjYwNyAxMS44NzJjLTEuMDc1IDQuMzQzLTEuMDg4IDkuOTY1IDMuMDQgMTQuMTYgMi4xNjQgMi4yMDggNC43MDYgMy4yNDQgNy4wMDUgMy44Ni40NDMuMTE4LjgzNy4xNDggMS4yNjIuMjM2IDEuNDk5IDcuMTEgNS45MzYgMTMuMTIzIDExLjg3IDE2LjQ2N2wuMDAyLjAwMy4wMDQuMDAxYzMuNDkxIDEuOTYyIDYuODA2IDIuODYgOS4yOSAzLjgxIDMuNDc2IDEuMzQgNy4xNCAyLjgyMyAxMS40MTMgMy4xOTdsLjIyNC4wMmguNTY3YzQuOTA1IDAgOC42MjctMS45ODIgMTEuODQ2LTMuMjEyaC4wMDJjMi40Ni0uOTQyIDUuNzg4LTEuODE0IDkuMzA1LTMuNzlhMjMuMTM5IDIzLjEzOSAwIDAgMCA0LjQ5OC0zLjMwOSAyNS40MDMgMjUuNDAzIDAgMCAwIDcuMzkyLTEyLjk2MmMyLjcyNy0uNDY2IDUuNjItMS42NiA4LjIzLTQuMzIzIDQuMTI2LTQuMTk0IDQuMTE0LTkuODE2IDMuMDQtMTQuMTU4LS41MzktMi4xNzItMS4zNzMtNC4xNTctMi42Ny01LjkyNi0xLjI5Ni0xLjc2OS0zLjMtMy44MTgtNi43MTctMy44MThsLjM3OC4wNDhjLS41My0uMDQ4LTEuMi0uMDc2LTEuNzc1LjAwNy0xLjE1Mi4xNjgtMi40NzMuNjI4LTMuOCAxLjQ0OC0xLjg3MyAxLjE1NC0yLjQ3IDIuMzE1LTMuMTA1IDMuMzM2LS4yMDguMzM0LS4zNC42MTMtLjUyMi45MzZDNjUuMzA2IDIuNTQ2IDU2LjA2NSAwIDQ1LjEzIDB6bS4wODcgNS4xNWMxMy4zNjkgMCAyMi42MDIgNC4wMDMgMjYuNTI2IDExLjE2NSAyLjM2NC0uOTE3IDQuMTA3LTcuMTA1IDYuMDU2LTguMzA0IDEuNTc4LS45NzYgMi41MDEtLjczNSAyLjUwMS0uNzM1IDMuNTcxIDAgNy4yNSAxMC41MTMgMi42NzUgMTUuMTU0LTIuNDE4IDIuNDcxLTYuODgxIDMuMTY1LTkuMTA0IDIuOTg4LS4xNjggNy4xNjMtNC4zNDEgMTMuNjMtOS44NjIgMTYuNzI0LTIuODA5IDEuNTc4LTUuODMyIDIuNDA0LTguNjI3IDMuNDc0LTMuNDY0IDEuMzI1LTYuNzE1IDIuODY4LTEwLjAwNiAyLjg2OGgtLjM0N2MtMy4yNzctLjI4Ni02LjU0LTEuNTMtMTAuMDA1LTIuODY4LTIuNzk2LTEuMDctNS44MTgtMS45MTgtOC42MjctMy40OTYtNS40OS0zLjA5NS05LjY2Ni05LjU0Mi05LjgzNC0xNi43MDQtMi4yMDYuMTktNi43MTktLjQ5Ny05LjE1NS0yLjk4Ni00LjU3NC00LjY0LS44OTUtMTUuMTU0IDIuNjc2LTE1LjE1NCAwIDAgLjkyMy0uMjQxIDIuNTAxLjczNSAxLjk2IDEuMjA1IDMuNzEgNy40NTQgNi4wOTQgOC4zMTlDMjIuNTk3IDkuMTUgMzEuODM2IDUuMTUgNDUuMjE3IDUuMTV6Ii8+PHBhdGggZD0iTTQ3LjE0IDQwLjk5Yy45MDIgMCAxLjQyMy0uNTg0IDEuNDIzLTEuMzczIDAtMS4yMzktLjUyMi0xLjcxNC0xLjQxOC0xLjc4Ni0uMzItLjAyNi0uNTg0LjA2NS0uNjc0LjM0Ny0uMDkuMjgyLjA1NC42MzMuMzQ3LjY3NC42ODYuMDk3LjY4NS4yMTYuNjg1LjU2NiAwIC4zNDgtLjQwMi40OTQtLjQ4NS41MTNhLjUzNi41MzYgMCAwIDAgLjEyMSAxLjA1OG0tMy44MzMuMDAxYy0uOTAyIDAtMS40MjMtLjU4NC0xLjQyMy0xLjM3MyAwLTEuMjM5LjUyMS0xLjcxNCAxLjQxNy0xLjc4Ni4zMjEtLjAyNi41ODQuMDY1LjY3NS4zNDcuMDkuMjgyLS4wNTQuNjMzLS4zNDcuNjc0LS42ODYuMDk3LS42ODYuMjE2LS42ODYuNTY2IDAgLjM0OC40MDMuNDk0LjQ4Ni41MTNhLjUzNi41MzYgMCAwIDEtLjEyMiAxLjA1OG0xNi40NzYtMjcuMDgxYy02LjMzNiAwLTExLjQ3MiA1LjEzNy0xMS40NzIgMTEuNDczIDAgNi4zMzYgNS4xMzYgMTEuNDczIDExLjQ3MiAxMS40NzMgNi4zMzYgMCAxMS40NzMtNS4xMzcgMTEuNDczLTExLjQ3MyAwLTYuMzM2LTUuMTM3LTExLjQ3My0xMS40NzMtMTEuNDczem0tMS42MDYgNi40NGE1LjEgNS4xIDAgMCAxIDAgMTAuMTk3IDUuMDk4IDUuMDk4IDAgMCAxLTQuOTM4LTYuMzY3IDIuMTQ0IDIuMTQ0IDAgMSAwIDIuMDc0LTIuOTUgNS4wNzIgNS4wNzIgMCAwIDEgMi44NjQtLjg4em0tMjcuNTI1LTYuNDRjLTYuMzM2IDAtMTEuNDcyIDUuMTM3LTExLjQ3MiAxMS40NzMgMCA2LjMzNiA1LjEzNiAxMS40NzMgMTEuNDcyIDExLjQ3MyA2LjMzNiAwIDExLjQ3My01LjEzNyAxMS40NzMtMTEuNDczIDAtNi4zMzYtNS4xMzctMTEuNDczLTExLjQ3My0xMS40NzN6bTEuNjQgNi40NGE1LjEgNS4xIDAgMCAxIDAgMTAuMTk3IDUuMDk4IDUuMDk4IDAgMCAxLTQuOTM4LTYuMzY3IDIuMTQ0IDIuMTQ0IDAgMCAwIDQuMTI3LS44MSAyLjE0MiAyLjE0MiAwIDAgMC0yLjA1NC0yLjE0IDUuMDc0IDUuMDc0IDAgMCAxIDIuODY0LS44OHoiLz48L2c+PC9zdmc+';

it('should generate a badge with { label, status }', function (): void {
    assertMatchesSnapshot(Badger::from(['label' => 'npm', 'message' => 'v1.0.0'])->render());
});

it('should generate a badge with { label, status, color }', function (): void {
    assertMatchesSnapshot(Badger::from(['label' => 'npm', 'message' => 'v1.0.0', 'color' => 'ADF'])->render());
});

it('should generate a badge with { label, status, style }', function (): void {
    assertMatchesSnapshot(Badger::from(['label' => 'npm', 'message' => 'v1.0.0', 'style' => 'flat'])->render());
});

it('should generate a badge with { label, status, color, style }', function (): void {
    assertMatchesSnapshot(Badger::from(['label' => 'npm', 'message' => 'v1.0.0', 'color' => 'ADF', 'style' => 'flat'])->render());
});

it('should generate a badge with { label, status, icon }', function () use ($icon): void {
    assertMatchesSnapshot(Badger::from(['label' => 'docker', 'message' => 'icon', 'icon' => $icon])->render());
});

it('should generate a badge with { status, icon }', function () use ($icon): void {
    assertMatchesSnapshot(Badger::from(['label' => '', 'message' => 'icon', 'icon' => $icon])->render());
});

it('should generate a badge with { status, icon, iconWidth }', function () use ($icon): void {
    assertMatchesSnapshot(Badger::from(['label' => '', 'message' => 'icon', 'icon' => $icon, 'iconWidth' => 19])->render());
});

it('should generate a badge with { label, status, icon, style }', function () use ($icon): void {
    assertMatchesSnapshot(Badger::from(['label' => 'docker', 'message' => 'icon', 'style' => 'flat', 'icon' => $icon])->render());
});

it('should correctly escapes string inputs with an icon', function (): void {
    assertMatchesSnapshot(Badger::from([
        'label' => '<escape me>',
        'message' => '<escape me>',
        'color' => '<escape me>',
        'icon' => '<escape me>',
        'labelColor' => '<escape me>',
    ]));
});

it('should generate a bare badge with { status }', function (): void {
    assertMatchesSnapshot(Badger::from(['message' => 'v1.0.0'])->render());
});

it('should generate a bare badge with { status, color }', function (): void {
    assertMatchesSnapshot(Badger::from(['message' => 'v1.0.0', 'color' => 'ADF'])->render());
});

it('should generate a bare badge with { status, style }', function (): void {
    assertMatchesSnapshot(Badger::from(['message' => 'v1.0.0', 'style' => 'flat'])->render());
});

it('should correctly escapes string inputs without an icon', function (): void {
    assertMatchesSnapshot(Badger::from([
        'message' => '<escape me>',
        'color' => '<escape me>',
    ]));
});

it('should render a badge in the classic style (using the fluent API)', function (): void {
    assertMatchesSnapshot(
        Badger::make()
            ->withLabel('Hello')
            ->withLabelColor('slate.900')
            ->withStatus('World')
            ->withStatusColor('green.600')
            ->withStyle('classic')
            ->render(),
    );
});

it('should render a badge in the flat style (using the fluent API)', function (): void {
    assertMatchesSnapshot(
        Badger::make()
            ->withLabel('Hello')
            ->withLabelColor('slate.900')
            ->withStatus('World')
            ->withStatusColor('green.600')
            ->withStyle('flat')
            ->render(),
    );
});

it('should render a badge in the classic style with an icon (using the fluent API)', function () use ($icon): void {
    assertMatchesSnapshot(
        Badger::make()
            ->withLabel('Hello')
            ->withLabelColor('slate.900')
            ->withStatus('World')
            ->withStatusColor('green.600')
            ->withStyle('flat')
            ->withIcon($icon)
            ->render(),
    );
});

it('should render a badge in the flat style with an icon (using the fluent API)', function () use ($icon): void {
    assertMatchesSnapshot(
        Badger::make()
            ->withLabel('Hello')
            ->withLabelColor('slate.900')
            ->withStatus('World')
            ->withStatusColor('green.600')
            ->withStyle('flat')
            ->withIcon($icon)
            ->render(),
    );
});

it('should calculate the width of UTF-8', function (): void {
    expect(Badger::make()->calculateTextWidth('npm'))->toBe(249);
});

it('should calculate the width of unicode', function (): void {
    expect(Badger::make()->calculateTextWidth('壹佰贰拾叁'))->toBe(550);
});

it('should calculate the width of special characters', function (): void {
    expect(Badger::make()->calculateTextWidth('<{[(&)]}>'))->toBe(600);
});

it('should calculate the width of accented characters', function (): void {
    expect(Badger::make()->calculateTextWidth('i'))->toBe(30);
    expect(Badger::make()->calculateTextWidth('ï'))->toBe(30);
    expect(Badger::make()->calculateTextWidth('e'))->toBe(66);
    expect(Badger::make()->calculateTextWidth('é'))->toBe(66);
    expect(Badger::make()->calculateTextWidth('s'))->toBe(57);
    expect(Badger::make()->calculateTextWidth('ṣ'))->toBe(57);

    expect(Badger::make()->calculateTextWidth('i') === Badger::make()->calculateTextWidth('ï'))->toBeTrue();
    expect(Badger::make()->calculateTextWidth('e') === Badger::make()->calculateTextWidth('é'))->toBeTrue();
    expect(Badger::make()->calculateTextWidth('s') === Badger::make()->calculateTextWidth('ṣ'))->toBeTrue();
});

it('should calculate the width of emojis', function (): void {
    expect(Badger::make()->calculateTextWidth('💩🤱🦄'))->toBe(330);
});

it('should escape special characters', function (): void {
    expect(Badger::make()->sanitizeText('<escape me>'))->toBe('&lt;escape me&gt;');
})->skip();
