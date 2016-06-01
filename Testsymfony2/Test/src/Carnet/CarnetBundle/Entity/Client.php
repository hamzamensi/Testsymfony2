<?php
// src/AppBundle/Entity/User.php

namespace Carnet\CarnetBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_client", type="string", length=255, nullable=true)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_client", type="string", length=255, nullable=true)
     */
    private $prenomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_client", type="string", length=255, nullable=true)
     */
    private $adresseClient;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_client", type="string", length=255, nullable=true)
     */
    private $telClient;

    /**
     * @var string
     *
     * @ORM\Column(name="web_client", type="string", length=255, nullable=true)
     */
    private $webClient;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set nomClient
     *
     * @param string $nomClient
     *
     * @return Client
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    /**
     * Get nomClient
     *
     * @return string
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * Set prenomClient
     *
     * @param string $prenomClient
     *
     * @return Client
     */
    public function setPrenomClient($prenomClient)
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    /**
     * Get prenomClient
     *
     * @return string
     */
    public function getPrenomClient()
    {
        return $this->prenomClient;
    }

    /**
     * Set adresseClient
     *
     * @param string $adresseClient
     *
     * @return Client
     */
    public function setAdresseClient($adresseClient)
    {
        $this->adresseClient = $adresseClient;

        return $this;
    }

    /**
     * Get adresseClient
     *
     * @return string
     */
    public function getAdresseClient()
    {
        return $this->adresseClient;
    }

    /**
     * Set telClient
     *
     * @param string $telClient
     *
     * @return Client
     */
    public function setTelClient($telClient)
    {
        $this->telClient = $telClient;

        return $this;
    }

    /**
     * Get telClient
     *
     * @return string
     */
    public function getTelClient()
    {
        return $this->telClient;
    }

    /**
     * Set webClient
     *
     * @param string $webClient
     *
     * @return Client
     */
    public function setWebClient($webClient)
    {
        $this->webClient = $webClient;

        return $this;
    }

    /**
     * Get webClient
     *
     * @return string
     */
    public function getWebClient()
    {
        return $this->webClient;
    }
}
