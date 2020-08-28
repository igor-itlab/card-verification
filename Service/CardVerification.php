<?php

namespace CardVerification\Service;

use CardVerification\Entity\ClientInterface;
use CardVerification\Entity\CreditCardInterface;
use CardVerification\Entity\FileUploaderInterface;
use CardVerification\Service\FileUploader;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CardVerification
{
    private ClientInterface $client;
    private CreditCardInterface $creditCard;

    public function __construct(ClientInterface $client, CreditCardInterface $creditCard)
    {
        $this->client = $client;
        $this->creditCard = $creditCard;
    }

    public function verificateCard(CreditCardInterface $creditCard, $formData, $currentUser, $directoryForImage )
    {
        $creditCard->setClient($currentUser);

        $fileUploader = new FileUploader($directoryForImage);
        $creditCard->setPhotos((array)$this->handleFiles($formData['photos'], $fileUploader));

        return new JsonResponse(null, Response::HTTP_OK);

    }

    private function handleFiles($files, FileUploaderInterface $fileUploader) {
        if($files) {
            $fileName = array();
            $filesSize = null;

            foreach ($files as $key => $file) {
                $fileName[] = [
                    "name" => $fileUploader->upload($file)
                ];

                $fileSize = filesize($fileUploader->getTargetDirectory() . '/' . $fileName[$key]['name']);
                $filesSize += $fileSize;
            }

            return $fileName;
        }
    }
}