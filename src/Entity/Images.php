<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
#[Vich\Uploadable]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'images', fileNameProperty: 'url')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;


    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        

        // if (null !== $imageFile) {
        //     $this->updatedAt = new \DateTimeImmutable();
        // }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function __toString(): string
    {
        $url = $this->getUrl();
    
        if ($url === null) {
            error_log('URL is null for Images entity with ID: ' . $this->getId());
        }
    
        return $url ?? '';
    }
}
