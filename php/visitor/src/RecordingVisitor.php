<?php
declare(strict_types=1);

namespace App\src;

use App\src\Contracts\VisitorRole;
use App\src\Contracts\Role;

class RecordingVisitor implements VisitorRole
{
    /** @var Role[] */
    private array $visited = [];

    public function visitUser(User $user)
    {
        $this->visited[] = $user;
    }

    public function visitGroup(Group $group)
    {
        $this->visited[] = $group;
    }

    /**
     * @return Role[]
     */
    public function getVisited(): array
    {
        return $this->visited;
    }
}