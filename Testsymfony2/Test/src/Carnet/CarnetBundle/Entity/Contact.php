<?php

namespace Carnet\CarnetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="Carnet\CarnetBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Carnet\CarnetBundle\Entity\Client", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity="Carnet\CarnetBundle\Entity\Client", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $ajouterpar;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contact
     *
     * @param \Carnet\CarnetBundle\Entity\Client $contact
     *
     * @return Contact
     */
    public function setContact(\Carnet\CarnetBundle\Entity\Client $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \Carnet\CarnetBundle\Entity\Client
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set ajouterpar
     *
     * @param \Carnet\CarnetBundle\Entity\Client $ajouterpar
     *
     * @return Contact
     */
    public function setAjouterpar(\Carnet\CarnetBundle\Entity\Client $ajouterpar)
    {
        $this->ajouterpar = $ajouterpar;

        return $this;
    }

    /**
     * Get ajouterpar
     *
     * @return \Carnet\CarnetBundle\Entity\Client
     */
    public function getAjouterpar()
    {
        return $this->ajouterpar;
    }
}
