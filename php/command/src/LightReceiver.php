<?php
declare(strict_types=1);

namespace App\Src;

class LightReceiver
{
    private string $lights = 'off';

    public function turnOn(): void
    {
        $this->lights = 'on';
    }

    public function turnOff(): void
    {
        $this->lights = 'off';
    }

    public function getLights(): string
    {
        return $this->lights;
    }
}