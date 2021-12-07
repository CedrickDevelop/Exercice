<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Departement;

/**
 * Computer
 *
 * @ORM\Table(name="computer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComputerRepository")
 */
class Computer
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
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     * @Assert\Length(min="2", max="12", minMessage="Il doit y avoir au moins {{ limit }} caractères")
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="system", type="string", length=255)
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     * @Assert\Length(min="2", max="12", minMessage="Il doit y avoir au moins {{ limit }} caractères")
     */
    private $system;
    
    /**
     * @var string
     *
     * @ORM\Column(name="macAdresse", type="string", length=255)
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     */
    private $macAdresse;
    
    /**
     * @var string
     *
     * @ORM\Column(name="images", type="array", nullable=true)
     */
    private $images;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="purchase", type="datetime")
     */
    private $purchase;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Departement")
     */
    private $nameDepartement;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Computer
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set system
     *
     * @param string $system
     *
     * @return Computer
     */
    public function setSystem($system)
    {
        $this->system = $system;

        return $this;
    }

    /**
     * Get system
     *
     * @return string
     */
    public function getSystem()
    {
        return $this->system;
    }

    /**
     * Set purchase
     *
     * @param \DateTime $purchase
     *
     * @return Computer
     */
    public function setPurchase($purchase)
    {
        $this->purchase = $purchase;

        return $this;
    }

    /**
     * Get purchase
     *
     * @return \DateTime
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * Set nameDepartement
     *
     * @param \AppBundle\Entity\Departement $nameDepartement
     *
     * @return Computer
     */
    public function setNameDepartement(\AppBundle\Entity\Departement $nameDepartement = null)
    {
        $this->nameDepartement = $nameDepartement;

        return $this;
    }

    /**
     * Get nameDepartement
     *
     * @return \AppBundle\Entity\Departement
     */
    public function getNameDepartement()
    {
        return $this->nameDepartement;
    }

    /**
     * Set macAdresse
     *
     * @param string $macAdresse
     *
     * @return Computer
     */
    public function setMacAdresse($macAdresse)
    {
        $this->macAdresse = $macAdresse;

        return $this;
    }

    /**
     * Get macAdresse
     *
     * @return string
     */
    public function getMacAdresse()
    {
        return $this->macAdresse;
    }

    /**
     * Set images
     *
     * @param array $images
     *
     * @return Computer
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }
}
