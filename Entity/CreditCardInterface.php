<?php

namespace CardVerification\Entity;

use DateTime;

interface CreditCardInterface
{
    public function getClient(): CLientInterface;

    public function getDateTo(): DateTime;

    public function getSeen(): bool;

    public function getVerified(): string;

    public function getDateUpload(): DateTime;

    public function getDateValid(): DateTime;

    public function getCardNumber(): string;

    public function getPhotos(): array;

    public function getPhoto();

    public function getCommentary(): string;

}