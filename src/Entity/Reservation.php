<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="fk_num_chambre", columns={"numero_chembre"}), @ORM\Index(name="fk_num_client", columns={"num_client"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_res", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRes;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_chembre", type="integer", nullable=false)
     */
    private $numeroChembre;

    /**
     * @var string
     *
     * @ORM\Column(name="date_ariv", type="string", length=50, nullable=false)
     */
    private $dateAriv;

    /**
     * @var string
     *
     * @ORM\Column(name="date_dep", type="string", length=50, nullable=false)
     */
    private $dateDep;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_client", referencedColumnName="id")
     * })
     */
    private $numClient;

    public function getIdRes(): ?int
    {
        return $this->idRes;
    }

    public function getNumeroChembre(): ?int
    {
        return $this->numeroChembre;
    }

    public function setNumeroChembre(int $numeroChembre): self
    {
        $this->numeroChembre = $numeroChembre;

        return $this;
    }

    public function getDateAriv(): ?string
    {
        return $this->dateAriv;
    }

    public function setDateAriv(string $dateAriv): self
    {
        $this->dateAriv = $dateAriv;

        return $this;
    }

    public function getDateDep(): ?string
    {
        return $this->dateDep;
    }

    public function setDateDep(string $dateDep): self
    {
        $this->dateDep = $dateDep;

        return $this;
    }

    public function getNumClient(): ?Client
    {
        return $this->numClient;
    }

    public function setNumClient(?Client $numClient): self
    {
        $this->numClient = $numClient;

        return $this;
    }


}
