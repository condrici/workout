<?php
declare(strict_types=1);

namespace App\src;

abstract class BookAbstract
{
    protected string $title;
    protected int $pages;

    protected object $object;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getPages(): int
    {
        return $this->pages;
    }

    public function setPages($pages): void
    {
        $this->pages = $pages;
    }

    public function getObject(): object
    {
        return $this->object;
    }

    public function setObject(object $object): void
    {
        $this->object = $object;
    }



    abstract public function __clone();
}