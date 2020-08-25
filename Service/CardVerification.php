<?php

use Symfony\Component\Filesystem\Filesystem;
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

    public function verificateCard(CreditCardInterface $creditCard, $data, $currentUser, $directoryForImage )
    {
        $creditCard->setClient($currentUser);

        $fileUploader = new FileUploader($directoryForImage);
        $creditCard->setPhotos((array)$this->handleFiles($data['photos'], $fileUploader));

//        $count = $entityManager->getRepository(__CLASS__)->count(['seen' => false]);
//        try {
//            $update = new Update(
//                'http://buycoin/card/write',
//                json_encode(
//                    [
//                        'status' => Response::HTTP_OK,
//                        'count'  => $count
//                    ]
//                )
//            );
//            $publisher($update);
//        } catch (Exception $exception) {
//            return $creditCard;
//        }

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

            if ($filesSize > 20000000) {
                //return new JsonResponse(null, Response::HTTP_NO_CONTENT);
                return new Exception;
            }

            return $fileName;
        }
    }
}