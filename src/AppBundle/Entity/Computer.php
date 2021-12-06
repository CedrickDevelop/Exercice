<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="system", type="string", length=255)
     */
    private $system;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="purchase", type="datetime")
     */
    private $purchase;

    /**
     * @var string
     *
     * @ORM\Column(name="name_departement", type="string", length=255)
     */
    private $nameDepartement;


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
     * @param string $nameDepartement
     *
     * @return Computer
     */
    public function setNameDepartement($nameDepartement)
    {
        $this->nameDepartement = $nameDepartement;

        return $this;
    }

    /**
     * Get nameDepartement
     *
     * @return string
     */
    public function getNameDepartement()
    {
        return $this->nameDepartement;
    }
}