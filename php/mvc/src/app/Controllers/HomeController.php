<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\Controller;
use App\Models\Book;

class HomeController extends Controller
{
    public function index(): void
    {
        $books = [
            new Book('Relentless', 'Self Development'),
            new Book('Get better', 'Self Development'),
            new Book('Do more', 'Self Development')
        ];

        $this->render(
            view: 'index',
            data: ['books' => $books]
        );
    }
}