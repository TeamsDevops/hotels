<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"sexe"}), @ORM\UniqueConstraint(name="tel", columns={"etat_civil"})}, indexes={@ORM\Index(name="fk_num_reservation", columns={"num_res"})})
 * @ORM\Entity
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="sexe", type="integer", nullable=false)
     */
    private $sexe;

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
     * @var \EtatCivil
     *
     * @ORM\ManyToOne(targetEntity="EtatCivil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etat_civil", referencedColumnName="id")
     * })
     */
    private $etatCivil;

    /**
     * @var \Reservation
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_res", referencedColumnName="id_res")
     * })
     */
    private $numRes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?int
    {
        return $this->sexe;
    }

    public function setSexe(int $sexe): self
    {
        $this->sexe = $sexe;

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

    public function getEtatCivil(): ?EtatCivil
    {
        return $this->etatCivil;
    }

    public function setEtatCivil(?EtatCivil $etatCivil): self
    {
        $this->etatCivil = $etatCivil;

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
