<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\CardBin;
use Cielo\API30\Environment;
use Cielo\API30\Merchant;
use Psr\Log\LoggerInterface;
use RuntimeException;

class QueryBinRequest extends AbstractRequest
{

    private $environment;

	public function __construct(Merchant $merchant, Environment $environment, LoggerInterface $logger = null)
    {
        parent::__construct($merchant, $logger);

        $this->environment = $environment;
    }

    /**
     * @param $binNumber
     *
     * @return null
     * @throws CieloRequestException
     * @throws RuntimeException
     */
    public function execute($binNumber)
    {
        $url = $this->environment->getApiQueryURL() . '1/cardBin/' . $binNumber;

        return $this->sendRequest('GET', $url);
    }

    /**
     * @param $json
     *
     * @return CardBin
     */
    protected function unserialize($json)
    {
        return CardBin::fromJson($json);
    }
}
