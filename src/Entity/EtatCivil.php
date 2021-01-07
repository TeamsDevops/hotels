<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtatCivil
 *
 * @ORM\Table(name="etat_civil", uniqueConstraints={@ORM\UniqueConstraint(name="etat", columns={"etat"})})
 * @ORM\Entity
 */
class EtatCivil
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
     * @ORM\Column(name="etat", type="string", length=50, nullable=false)
     */
    private $etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }


}
