<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarsRepository::class)]
class Cars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Slug = null;

    #[ORM\Column]
    private ?float $Price = null;

    #[ORM\Column]
    private ?float $Year = null;

    #[ORM\Column]
    private ?float $Kilometrage = null;

    #[ORM\ManyToOne]
    private ?Carburants $Carburant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\ManyToMany(targetEntity: Options::class, inversedBy: 'cars')]
    private Collection $Options;

    #[ORM\Column(length: 255)]
    private ?string $Illustration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $galery1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $galery2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $galery3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $galery4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $galery5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $galery6 = null;

    public function __construct()
    {
        $this->Options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->Slug;
    }

    public function setSlug(string $Slug): static
    {
        $this->Slug = $Slug;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getYear(): ?float
    {
        return $this->Year;
    }

    public function setYear(float $Year): static
    {
        $this->Year = $Year;

        return $this;
    }

    public function getKilometrage(): ?float
    {
        return $this->Kilometrage;
    }

    public function setKilometrage(float $Kilometrage): static
    {
        $this->Kilometrage = $Kilometrage;

        return $this;
    }

    public function getCarburant(): ?Carburants
    {
        return $this->Carburant;
    }

    public function setCarburant(?Carburants $Carburant): static
    {
        $this->Carburant = $Carburant;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Options>
     */
    public function getOptions(): Collection
    {
        return $this->Options;
    }

    public function addOption(Options $option): static
    {
        if (!$this->Options->contains($option)) {
            $this->Options->add($option);
        }

        return $this;
    }

    public function removeOption(Options $option): static
    {
        $this->Options->removeElement($option);

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->Illustration;
    }

    public function setIllustration(string $Illustration): static
    {
        $this->Illustration = $Illustration;

        return $this;
    }

    public function getGalery1(): ?string
    {
        return $this->galery1;
    }

    public function setGalery1(?string $galery1): static
    {
        $this->galery1 = $galery1;

        return $this;
    }

    public function getGalery2(): ?string
    {
        return $this->galery2;
    }

    public function setGalery2(?string $galery2): static
    {
        $this->galery2 = $galery2;

        return $this;
    }

    public function getGalery3(): ?string
    {
        return $this->galery3;
    }

    public function setGalery3(?string $galery3): static
    {
        $this->galery3 = $galery3;

        return $this;
    }

    public function getGalery4(): ?string
    {
        return $this->galery4;
    }

    public function setGalery4(?string $galery4): static
    {
        $this->galery4 = $galery4;

        return $this;
    }

    public function getGalery5(): ?string
    {
        return $this->galery5;
    }

    public function setGalery5(?string $galery5): static
    {
        $this->galery5 = $galery5;

        return $this;
    }

    //...

    public function getGalery6(): ?string
    {
        return $this->galery6;
    }

    public function setGalery6(?string $galery6): static
    {
        $this->galery6 = $galery6;

        return $this;
    }
}
