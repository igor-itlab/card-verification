<?php

namespace CardVerification\Entity;


interface FileServiceInterface
{
    /**
     * @param string $directory
     */
    public function createDirectory(string $directory): void;

    /**
     * @return FileServiceInterface
     */
    public static function getInstance(): FileServiceInterface;

}