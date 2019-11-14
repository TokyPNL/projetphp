<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitsRepository")
 */
class Produits
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantit;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixUnitaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ligneCommande", mappedBy="produits")
     */
    private $idProduit;

    public function __construct()
    {
        $this->idProduit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getQuantit(): ?int
    {
        return $this->quantit;
    }

    public function setQuantit(int $quantit): self
    {
        $this->quantit = $quantit;

        return $this;
    }

    public function getPrixUnitaire(): ?int
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(int $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    /**
     * @return Collection|ligneCommande[]
     */
    public function getIdProduit(): Collection
    {
        return $this->idProduit;
    }

    public function addIdProduit(ligneCommande $idProduit): self
    {
        if (!$this->idProduit->contains($idProduit)) {
            $this->idProduit[] = $idProduit;
            $idProduit->setProduits($this);
        }

        return $this;
    }

    public function removeIdProduit(ligneCommande $idProduit): self
    {
        if ($this->idProduit->contains($idProduit)) {
            $this->idProduit->removeElement($idProduit);
            // set the owning side to null (unless already changed)
            if ($idProduit->getProduits() === $this) {
                $idProduit->setProduits(null);
            }
        }

        return $this;
    }
}
