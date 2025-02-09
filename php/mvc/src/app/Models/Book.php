<?php
declare(strict_types=1);

namespace App\Models;

class Book
{
    public string $title;
    public string $genre;

    public function __construct($title, $genre)
    {
        $this->title = $title;
        $this->genre = $genre;
    }
}