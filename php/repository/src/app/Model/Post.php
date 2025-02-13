<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\Contracts\ModelAbstract;

class Post extends ModelAbstract
{
    private int $id;
    private string $name;
    private ?string $contents;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getContents(): ?string
    {
        return $this->contents;
    }

    public function setContents(?string $contents): void
    {
        $this->contents = $contents;
    }


}