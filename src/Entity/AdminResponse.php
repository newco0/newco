<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminResponseRepository")
 */
class AdminResponse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\contact", inversedBy="adminResponses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\users", inversedBy="adminResponses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $message;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRead;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $date_register;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_update;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_delete;

     
    public function __construct()
    {
        $this->setIsActive(true);
        $this->setIsRead(false);
        $this->setDateRegister(new \DateTime());
        $this->setDateUpdate(new \DateTime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContact(): ?contact
    {
        return $this->contact;
    }

    public function setContact(?contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getAdmin(): ?users
    {
        return $this->admin;
    }

    public function setAdmin(?users $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIsRead(): ?bool
    {
        return $this->isRead;
    }

    public function setIsRead(bool $isRead): self
    {
        $this->isRead = $isRead;

        return $this;
    }

    public function getDateRegister(): ?\DateTimeInterface
    {
        return $this->date_register;
    }

    public function setDateRegister(\DateTimeInterface $date_register): self
    {
        $this->date_register = $date_register;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->date_update;
    }

    public function setDateUpdate(?\DateTimeInterface $date_update): self
    {
        $this->date_update = $date_update;

        return $this;
    }

    public function getDateDelete(): ?\DateTimeInterface
    {
        return $this->date_delete;
    }

    public function setDateDelete(?\DateTimeInterface $date_delete): self
    {
        $this->date_delete = $date_delete;

        return $this;
    }
}
