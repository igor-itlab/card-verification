<?php


interface FileUploaderInterface
{
    /**
     * @param $file
     * @return mixed
     */
    public function upload($file);

    /**
     * @return mixed
     */
    public function getTargetDirectory();

    /**
     * @param string $targetDirectory
     */
    public function setTargetDirectory(string $targetDirectory): void;
}