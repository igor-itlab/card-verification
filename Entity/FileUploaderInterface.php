<?php

namespace CardVerification\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileUploaderInterface
{
    /**
     * @param $file
     * @return mixed
     */
    public function upload(UploadedFile $file);

    /**
     * @return mixed
     */
    public function getTargetDirectory();

    /**
     * @param string $targetDirectory
     */
    public function setTargetDirectory(string $targetDirectory): void;
}