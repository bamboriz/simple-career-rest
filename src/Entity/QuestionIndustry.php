<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionIndustryRepository")
 */
class QuestionIndustry
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $industryId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $questionId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $industryName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndustryId(): ?string
    {
        return $this->industryId;
    }

    public function setIndustryId(string $industryId): self
    {
        $this->industryId = $industryId;

        return $this;
    }

    public function getQuestionId(): ?string
    {
        return $this->questionId;
    }

    public function setQuestionId(string $questionId): self
    {
        $this->questionId = $questionId;

        return $this;
    }

    public function getIndustryName(): ?string
    {
        return $this->industryName;
    }

    public function setIndustryName(string $industryName): self
    {
        $this->industryName = $industryName;

        return $this;
    }
}
