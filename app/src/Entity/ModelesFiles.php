<?php

namespace App\Entity;

use App\Repository\ModelesFilesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelesFilesRepository::class)]
class ModelesFiles
{
    #[ORM\Id]
    #[ORM\Column]
    private ?string $id = null;
	
	#[ORM\ManyToOne(targetEntity: Modeles::class, inversedBy: "modelesFiles")]
	#[ORM\JoinColumn(name: "modeles_id", referencedColumnName: "id")]
	private ?Modeles $modeles = null;
	
	#[ORM\ManyToOne(targetEntity: DirectusFiles::class)]
	#[ORM\JoinColumn(name: "directus_files_id", referencedColumnName: "id")]
	private ?DirectusFiles $directusFiles = null;
	
	
	public function getId(): ?string
    {
        return $this->id;
    }
	
	public function getModeles(): ?Modeles
	{
		return $this->modeles;
	}
	
	public function setModeles(?Modeles $modeles): static
	{
		$this->modeles = $modeles;
		return $this;
	}
	
	public function getDirectusFiles(): ?DirectusFiles
	{
		return $this->directusFiles;
	}
	
	public function setDirectusFiles(?DirectusFiles $directusFiles): static
	{
		$this->directusFiles = $directusFiles;
		return $this;
	}
}
