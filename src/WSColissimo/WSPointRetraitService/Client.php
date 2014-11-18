<?php

namespace WSColissimo\WSPointRetraitService;

use WSColissimo\WSPointRetraitService\Request\RDVPointRetraitAcheminementRequest;
use WSColissimo\WSPointRetraitService\Request\PointRetraitAcheminementByIDRequest;

/**
 * A client for the WSPointRetraitService
 *
 * @author Kevin Monmousseau <kevin@1001pharmacies.com>
 */
class Client implements ClientInterface
{
    /**
     * PHP SOAP client for interacting with the WSPointRetraitService API
     *
     * @var SoapClient
     */
    protected $soapClient;

    /**
     * Construct SO Flexibilite SOAP client
     *
     * @param \SoapClient $soapClient
     */
    public function __construct(\SoapClient $soapClient)
    {
        $this->soapClient = $soapClient;
    }

    /**
     * (non-PHPdoc)
     * @see \WSColissimo\WSPointRetraitService\ClientInterface::findRDVPointRetraitAcheminement()
     */
    public function findRDVPointRetraitAcheminement(RDVPointRetraitAcheminementRequest $request)
    {
        return $this->soapClient->__soapCall('findRDVPointRetraitAcheminement', array($request));
    }

    /**
     * (non-PHPdoc)
     * @see \WSColissimo\WSPointRetraitService\ClientInterface::findPointRetraitAcheminementByID()
     */
    public function findPointRetraitAcheminementByID(PointRetraitAcheminementByIDRequest $request)
    {
        return $this->soapClient->__soapCall('findRDVPointRetraitAcheminement', array($request));
    }
}