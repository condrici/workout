<?php
declare(strict_types=1);

namespace App\Src\Models\User;

use Exception;
use App\Src\Contracts\StorageAdapter;

readonly class UserMapper
{
    public function __construct (private StorageAdapter $storageAdapter)
    {
    }

    /**
     * @throws Exception
     */
    public function findOrThrow(int $id): User
    {
        $user = $this->storageAdapter->find($id);
        if ($user !== null) {
            return $this->mapToUser($id, $user);
        }

        throw new Exception('Could not find user');
    }

    private function mapToUser(int $id, array $user): User
    {
        $object = new User();

        $object->setFirstName($user['firstName']);
        $object->setLastName($user['lastName']);
        $object->setUniqueId($id);

        return $object;
    }

}