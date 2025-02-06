<?php
declare(strict_types=1);

namespace App\src\Mediators;

use App\Src\Contracts\Mediator;
use App\Src\Services\UiService;
use App\Src\Repository\UserRepository;
use App\src\Models\User\User;

readonly class UserRepositoryUiMediator implements Mediator
{
    public function __construct(
        private UserRepository $userRepository,
        private UiService      $uiService
    ) {
        $this->userRepository->setMediator($this);
        $this->uiService->setMediator($this);
    }

    public function getUser(int $id): User
    {
        return $this->userRepository->findById($id);
    }

    public function getFullUsername(int $id): string
    {
        return $this->uiService->outputUserInfo($id);
    }

}