<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneCommandeRepository")
 */
class LigneCommande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\produit", mappedBy="ligneCommande")
     */
    private $idProduit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\produit", mappedBy="ligneCommande")
     */
    private $qteCom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produits", inversedBy="idProduit")
     */
    private $produits;

    public function __construct()
    {
        $this->idProduit = new ArrayCollection();
        $this->qteCom = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|produit[]
     */
    public function getIdProduit(): Collection
    {
        return $this->idProduit;
    }

    public function addIdProduit(produit $idProduit): self
    {
        if (!$this->idProduit->contains($idProduit)) {
            $this->idProduit[] = $idProduit;
            $idProduit->setLigneCommande($this);
        }

        return $this;
    }

    public function removeIdProduit(produit $idProduit): self
    {
        if ($this->idProduit->contains($idProduit)) {
            $this->idProduit->removeElement($idProduit);
            // set the owning side to null (unless already changed)
            if ($idProduit->getLigneCommande() === $this) {
                $idProduit->setLigneCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|produit[]
     */
    public function getQteCom(): Collection
    {
        return $this->qteCom;
    }

    public function addQteCom(produit $qteCom): self
    {
        if (!$this->qteCom->contains($qteCom)) {
            $this->qteCom[] = $qteCom;
            $qteCom->setLigneCommande($this);
        }

        return $this;
    }

    public function removeQteCom(produit $qteCom): self
    {
        if ($this->qteCom->contains($qteCom)) {
            $this->qteCom->removeElement($qteCom);
            // set the owning side to null (unless already changed)
            if ($qteCom->getLigneCommande() === $this) {
                $qteCom->setLigneCommande(null);
            }
        }

        return $this;
    }

    public function getProduits(): ?Produits
    {
        return $this->produits;
    }

    public function setProduits(?Produits $produits): self
    {
        $this->produits = $produits;

        return $this;
    }
}
