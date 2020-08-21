<?php


interface ClientInterface
{
    public const STATUS_STABLE  = 'stable';
    public const STATUS_TRUSTED    = 'trusted';
    public const STATUS_SUSPICIOUS = 'suspicious';

    /**
     * @return mixed
     */
    public function getRoles();

    /**
     * @return mixed
     */
    public function getBanned();

    /**
     * @return mixed
     */
    public function getEnabled();

    /**
     * @return mixed
     */
    public function getApplicantId();

    /**
     * @return mixed
     */
    public function getReference();

    /**
     * @return mixed
     */
    public function getPercents();

    /**
     * @return mixed
     */
    public function getReferalToken();

    /**
     * @return mixed
     */
    public function getTrafficToken();

    /**
     * @return mixed
     */
    public function getRegistrationDate();

    /**
     * @return mixed
     */
    public function getStatus();

    /**
     * @return mixed
     */
    public function getVerified();

    /**
     * @return mixed
     */
    public function getRequisition();

    /**
     * @return mixed
     */
    public function getReferralsRequisitions();

    /**
     * @return array
     */
    public function getReferralClients(): array;

    /**
     * @return mixed
     */
    public function getReview();

    /**
     * @return mixed
     */
    public function getCashbackLevel();

    /**
     * @return mixed
     */
    public function getFirstLevelReferralProfit();

    /**
     * @return mixed
     */
    public function getSecondLevelReferralProfit();

    /**
     * @return mixed
     */
    public function getCashbackProfit();

    /**
     * @return mixed
     */
    public function getPayoutProfit();

    /**
     * @return mixed
     */
    public function getSystemProfit();

    /**
     * @return mixed
     */
    public function getCountOfFirstLevelReferralRequisitions();

    /**
     * @return mixed
     */
    public function getCountOfSecondLevelReferralRequisitions();

    /**
     * @return mixed
     */
    public function getVip();


}