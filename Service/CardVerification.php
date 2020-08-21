<?php


use Symfony\Component\Filesystem\Filesystem;

class CardVerification
{
    private ClientInterface $client;
    private CreditCardInterface $creditCard;

    public function __construct(ClientInterface $client, CreditCardInterface $creditCard)
    {
        $this->client = $client;
        $this->creditCard = $creditCard;
    }

    public function verificateCard(
        CreditCardInterface $creditCard,
        FileUploaderInterface $fileUploader,
        Filesystem $fileSystem,
        $currentUser,
        $directory,
        $entityManager)
    {
        $creditCard->setClient($currentUser);

        FileServiceInterface::getInstance()->createDirectory($fileSystem, $directory);
        $fileUploader->setTargetDirectory($directory);

        $this->setPhotos($creditCard);

        $entityManager->persist($creditCard);
        $entityManager->flush();

        $count = $entityManager->getRepository(__CLASS__)->count(['seen' => false]);
        try {
            $update = new Update(
                'http://buycoin/card/write',
                json_encode(
                    [
                        'status' => Response::HTTP_OK,
                        'count'  => $count
                    ]
                )
            );

            $publisher($update);
        } catch (Exception $exception) {
            return $creditCard;
        }

        return new Exception();
    }

    private function setPhotos(CreditCardInterface $creditCard) {
        if (!empty($creditCard->getPhoto())) {

            $fileName = array();
            $filesSize = null;
            foreach ($creditCard->getPhoto() as $key => $file) {
                $base64Image = $base64FileExtractor->extractBase64String($file['dataURL']);
                $uploadedFile = new UploadedBase64File($base64Image, $file['name']);
                $fileName[] = [
                    "name" => $fileUploader->upload($uploadedFile)
                ];

                $fileSize = filesize($directory . '/' . $fileName[$key]['name']);
                $filesSize += $fileSize;
            }
            if ($filesSize > 20000000) {
                return new JsonResponse(null, Response::HTTP_NO_CONTENT);
            }

            $creditCard->setPhotos($fileName);
        }
    }

}