<?php

namespace Cielo\API30\Ecommerce;

class CardBin implements \JsonSerializable
{
    private $status;
    private $provider;
    private $cardType;
    private $foreignCard;
    private $corporateCard;
    private $issuer;
    private $issuerCode;
    private $prepaid;

    /**
     * @param $json
     *
     * @return CardBin
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $bin = new CardBin();
        $bin->populate($object);

        return $bin;
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $dataProps = get_object_vars($data);

        $this->status = $dataProps['Status'] ?? '';
        $this->provider = $dataProps['Provider'] ?? '';
        $this->cardType = $dataProps['CardType'] ?? '';
        $this->foreignCard = $dataProps['ForeignCard'] ?? '';
        $this->corporateCard = $dataProps['CorporateCard'] ?? '';
        $this->issuer = $dataProps['Issuer'] ?? '';
        $this->issuerCode = $dataProps['IssuerCode'] ?? '';
        $this->prepaid = $dataProps['Prepaid'] ?? '';
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    public function getCardType()
    {
        return $this->cardType;
    }

    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    public function getForeignCard()
    {
        return $this->foreignCard;
    }

    public function setForeignCard($foreignCard)
    {
        $this->foreignCard = $foreignCard;
    }

    public function getCorporateCard()
    {
        return $this->corporateCard;
    }

    public function setCorporateCard($corporateCard)
    {
        $this->corporateCard = $corporateCard;
    }

    public function getIssuer()
    {
        return $this->issuer;
    }

    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
    }

    public function getIssuerCode()
    {
        return $this->issuerCode;
    }

    public function setIssuerCode($issuerCode)
    {
        $this->issuerCode = $issuerCode;
    }

    public function getPrepaid()
    {
        return $this->prepaid;
    }

    public function setPrepaid($prepaid)
    {
        $this->prepaid = $prepaid;
    }
}
