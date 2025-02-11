<?php
declare(strict_types=1);

namespace App\Middleware;

class ThrottlingMiddleware extends Middleware
{
    private $requestPerMinute;
    private $request;
    private $currentTime;

    public function __construct(int $requestPerMinute)
    {
        $this->requestPerMinute = $requestPerMinute;
        $this->currentTime = time();
    }

    public function check(string $email, string $password): bool
    {
        if (time() > $this->currentTime + 60) {
            $this->request = 0;
            $this->currentTime = time();
        }
        $this->request++;

        if ($this->request > $this->requestPerMinute) {
            echo "Throttling Middleware: " . "Request limit exceeded!\n";
            die();
        }

        return parent::check($email, $password);
    }
}