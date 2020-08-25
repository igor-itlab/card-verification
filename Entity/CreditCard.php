<?php


class CreditCard implements CreditCardInterface
{
    /**
     * @var CLientInterface
     */
    private CLientInterface $client;
    /**
     * @var DateTime
     */
    private DateTime $dateTo;
    /**
     * @var bool
     */
    private bool $seen;
    /**
     * @var string
     */
    private string $verified;
    /**
     * @var DateTime
     */
    private DateTime $dateUpload;
    /**
     * @var DateTime
     */
    private DateTime $dateValid;
    /**
     * @var string
     */
    private string $cardNumber;
    /**
     * @var array
     */
    private array $photos;
    /**
     * @var mixed
     */
    private $photo;
    /**
     * @var string
     */
    private string $commentary;

    /**
     * @return CLientInterface
     */
    public function getClient(): CLientInterface
    {
        return $this->client;
    }

    /**
     * @param CLientInterface $client
     */
    public function setClient(CLientInterface $client): void
    {
        $this->client = $client;
    }

    /**
     * @return DateTime
     */
    public function getDateTo(): DateTime
    {
        return $this->dateTo;
    }

    /**
     * @param DateTime $dateTo
     */
    public function setDateTo(DateTime $dateTo): void
    {
        $this->dateTo = $dateTo;
    }

    /**
     * @return bool
     */
    public function getSeen(): bool
    {
        return $this->seen;
    }

    /**
     * @param bool $seen
     */
    public function setSeen(bool $seen): void
    {
        $this->seen = $seen;
    }

    /**
     * @return string
     */
    public function getVerified(): string
    {
        return $this->verified;
    }

    /**
     * @param string $verified
     */
    public function setVerified(string $verified): void
    {
        $this->verified = $verified;
    }

    /**
     * @return DateTime
     */
    public function getDateUpload(): DateTime
    {
        return $this->dateUpload;
    }

    /**
     * @param DateTime $dateUpload
     */
    public function setDateUpload(DateTime $dateUpload): void
    {
        $this->dateUpload = $dateUpload;
    }

    /**
     * @return DateTime
     */
    public function getDateValid(): DateTime
    {
        return $this->dateValid;
    }

    /**
     * @param DateTime $dateValid
     */
    public function setDateValid(DateTime $dateValid): void
    {
        $this->dateValid = $dateValid;
    }

    /**
     * @return string
     */
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     */
    public function setCardNumber(string $cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * @return array
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
     * @param array $photos
     */
    public function setPhotos(array $photos): void
    {
        $this->photos[] = $photos;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getCommentary(): string
    {
        return $this->commentary;
    }

    /**
     * @param string $commentary
     */
    public function setCommentary(string $commentary): void
    {
        $this->commentary = $commentary;
    }

}