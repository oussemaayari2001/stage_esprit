<?php

namespace App\Entity;

use App\Repository\PhotosEtudiantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotosEtudiantRepository::class)]
class PhotosEtudiant
{
    #[ORM\Id]
    #[ORM\OneToOne(targetEntity: EspEtudiant::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: "id_et", referencedColumnName: "id_et", nullable: false)] // Ensure the join column is not nullable
    private ?EspEtudiant $id_et = null;

    #[ORM\Column(type: Types::BLOB, nullable: false)] // Ensure the BLOB column is not nullable
    private $photos_id = null;

    public function getPhotosId()
    {
        return $this->photos_id;
    }

    public function setPhotosId($photos_id): static
    {
        $this->photos_id = $photos_id;

        return $this;
    }

    public function getIdEt(): ?EspEtudiant
    {
        return $this->id_et;
    }

    public function setIdEt(?EspEtudiant $id_et): static
    {
        $this->id_et = $id_et;

        return $this;
    }
}
