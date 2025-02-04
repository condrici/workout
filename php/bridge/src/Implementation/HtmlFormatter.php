<?php
declare(strict_types=1);

namespace App\src\Implementation;

class HtmlFormatter implements Formatter
{
    public function format(string $text): string
    {
        return "<p>" . $text . "</p>";
    }

}