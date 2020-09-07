<?php
declare(strict_types=1);

namespace App\Domain\Video;

interface VideoRepository
{
    /**
     * @return Video[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
  //  public function findUserOfId(int $id): User;

 /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
   // public function existUser(string $username);

}
