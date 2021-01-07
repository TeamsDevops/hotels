<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambre
 *
 * @ORM\Table(name="chambre", indexes={@ORM\Index(name="fk_num_res", columns={"num_res"})})
 * @ORM\Entity
 */
class Chambre
{
    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numero;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_lit", type="integer", nullable=false)
     */
    private $nbrLit;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_pers", type="integer", nullable=false)
     */
    private $nbrPers;

    /**
     * @var int
     *
     * @ORM\Column(name="confort", type="integer", nullable=false)
     */
    private $confort;

    /**
     * @var string
     *
     * @ORM\Column(name="dateAriv", type="string", length=50, nullable=false)
     */
    private $dateariv;

    /**
     * @var string
     *
     * @ORM\Column(name="dateDep", type="string", length=50, nullable=false)
     */
    private $datedep;

    /**
     * @var \Reservation
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_res", referencedColumnName="id_res")
     * })
     */
    private $numRes;

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNbrLit(): ?int
    {
        return $this->nbrLit;
    }

    public function setNbrLit(int $nbrLit): self
    {
        $this->nbrLit = $nbrLit;

        return $this;
    }

    public function getNbrPers(): ?int
    {
        return $this->nbrPers;
    }

    public function setNbrPers(int $nbrPers): self
    {
        $this->nbrPers = $nbrPers;

        return $this;
    }

    public function getConfort(): ?int
    {
        return $this->confort;
    }

    public function setConfort(int $confort): self
    {
        $this->confort = $confort;

        return $this;
    }

    public function getDateariv(): ?string
    {
        return $this->dateariv;
    }

    public function setDateariv(string $dateariv): self
    {
        $this->dateariv = $dateariv;

        return $this;
    }

    public function getDatedep(): ?string
    {
        return $this->datedep;
    }

    public function setDatedep(string $datedep): self
    {
        $this->datedep = $datedep;

        return $this;
    }

    public function getNumRes(): ?Reservation
    {
        return $this->numRes;
    }

    public function setNumRes(?Reservation $numRes): self
    {
        $this->numRes = $numRes;

        return $this;
    }


}
