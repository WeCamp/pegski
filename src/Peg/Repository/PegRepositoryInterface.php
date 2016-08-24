<?php


namespace Peg\Repository;

/**
 * Peg repository.
 */
interface PegRepositoryInterface
{
    /**
     * Find the unique short codes used in the Pegs stored in MongoDB.
     *
     * @return mixed[]
     */
    public function findUsedShortCodes();
}
