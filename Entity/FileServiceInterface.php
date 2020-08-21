<?php


use Symfony\Component\Filesystem\Filesystem;

interface FileServiceInterface
{
    /**
     * @param $filesystem
     * @param string $directory
     */
    public function createDirectory(Filesystem $filesystem, string $directory): void;

    /**
     * @return FileServiceInterface
     */
    public static function getInstance(): FileServiceInterface;

}