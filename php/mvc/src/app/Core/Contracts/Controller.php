<?php
declare(strict_types=1);

namespace App\Core\Contracts;

abstract class Controller
{
    public function render(string $view, array $data = []): void
    {
        extract ($data);
        include __DIR__ . '/../../Views/' . "$view.php";
    }
}