<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $libellePro;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte;

    /**
     * @ORM\Column(type="integer")
     */
    private $pu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LigneCommande", inversedBy="idProduit")
     */
    private $ligneCommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellePro(): ?string
    {
        return $this->libellePro;
    }

    public function setLibellePro(string $libellePro): self
    {
        $this->libellePro = $libellePro;

        return $this;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getPu(): ?int
    {
        return $this->pu;
    }

    public function setPu(int $pu): self
    {
        $this->pu = $pu;

        return $this;
    }

    public function getLigneCommande(): ?LigneCommande
    {
        return $this->ligneCommande;
    }

    public function setLigneCommande(?LigneCommande $ligneCommande): self
    {
        $this->ligneCommande = $ligneCommande;

        return $this;
    }
}
